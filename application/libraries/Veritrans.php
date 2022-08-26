<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Veritrans
{

	/**
	 * Your merchant's server key
	 * @static
	 */
	public static $serverKey;

	/**
	 * true for production
	 * false for sandbox mode
	 * @static
	 */
	public static $isProduction = false;

	/**
	 * Default options for every request
	 * @static
	 */
	public static $curlOptions = array();

	const SANDBOX_BASE_URL = 'https://api.sandbox.midtrans.com';
	const PRODUCTION_BASE_URL = 'https://api.midtrans.com';
	const SNAP_SANDBOX_BASE_URL = 'https://app.sandbox.midtrans.com/snap/v1';
	const SNAP_PRODUCTION_BASE_URL = 'https://app.midtrans.com/snap/v1';

	public function config($params)
	{
		Veritrans::$serverKey = $params['server_key'];
		Veritrans::$isProduction = $params['production'];
	}

	/**
	 * @return string Veritrans API URL, depends on $isProduction
	 */
	public static function getBaseUrl()
	{
		return Veritrans::$isProduction ?
			Veritrans::PRODUCTION_BASE_URL : Veritrans::SANDBOX_BASE_URL;
	}

	/**
	 * Send GET request
	 * @param string  $url
	 * @param string  $server_key
	 * @param mixed[] $data_hash
	 */
	public static function get($url, $server_key, $data_hash)
	{
		return self::remoteCall($url, $server_key, $data_hash, false);
	}

	/**
	 * Send POST request
	 * @param string  $url
	 * @param string  $server_key
	 * @param mixed[] $data_hash
	 */
	public static function post($url, $server_key, $data_hash)
	{
		return self::remoteCall($url, $server_key, $data_hash, true);
	}

	/**
	 * Actually send request to API server
	 * @param string  $url
	 * @param string  $server_key
	 * @param mixed[] $data_hash
	 * @param bool    $post
	 */


	public static function remoteCall($url, $server_key, $data_hash, $post = true)
	{

		$ch = curl_init();

		if (!$server_key) {
			throw new Exception(
				'The ServerKey/ClientKey is null, You need to set the server-key from Config. Please double-check Config and ServerKey key. ' .
					'You can check from the Midtrans Dashboard. ' .
					'See https://docs.midtrans.com/en/midtrans-account/overview?id=retrieving-api-access-keys ' .
					'for the details or contact support at support@midtrans.com if you have any questions.'
			);
		} else {
			if ($server_key == "") {
				throw new Exception(
					'The ServerKey/ClientKey is invalid, as it is an empty string. Please double-check your ServerKey key. ' .
						'You can check from the Midtrans Dashboard. ' .
						'See https://docs.midtrans.com/en/midtrans-account/overview?id=retrieving-api-access-keys ' .
						'for the details or contact support at support@midtrans.com if you have any questions.'
				);
			} elseif (preg_match('/\s/', $server_key)) {
				throw new Exception(
					'The ServerKey/ClientKey is contains white-space. Please double-check your API key. Please double-check your ServerKey key. ' .
						'You can check from the Midtrans Dashboard. ' .
						'See https://docs.midtrans.com/en/midtrans-account/overview?id=retrieving-api-access-keys ' .
						'for the details or contact support at support@midtrans.com if you have any questions.'
				);
			}
		}

		$curl_options = array(
			CURLOPT_URL => $url,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Accept: application/json',
				'User-Agent: midtrans-php-v2.5.2',
				'Authorization: Basic ' . base64_encode($server_key . ':')
			),
			CURLOPT_RETURNTRANSFER => 1
		);

		// merging with Veritrans_Config::$curlOptions
		if (count(Veritrans::$curlOptions)) {
			// We need to combine headers manually, because it's array and it will no be merged
			if (Veritrans::$curlOptions[CURLOPT_HTTPHEADER]) {
				$mergedHeders = array_merge($curl_options[CURLOPT_HTTPHEADER], Veritrans::$curlOptions[CURLOPT_HTTPHEADER]);
				$headerOptions = array(CURLOPT_HTTPHEADER => $mergedHeders);
			} else {
				$mergedHeders = array();
			}

			$curl_options = array_replace_recursive($curl_options, Veritrans::$curlOptions, $headerOptions);
		}

		if ($post) {
			$curl_options[CURLOPT_POST] = 1;

			if ($data_hash) {
				$body = json_encode($data_hash);
				$curl_options[CURLOPT_POSTFIELDS] = $body;
			} else {
				$curl_options[CURLOPT_POSTFIELDS] = '';
			}
		}

		curl_setopt_array($ch, $curl_options);

		$result = curl_exec($ch);
		// var_dump($curl_options);
		// die;
		// curl_close($ch);

		if ($result === FALSE) {
			throw new Exception('CURL Error: ' . curl_error($ch), curl_errno($ch));
		} else {
			try {
				$result_array = json_decode($result);
			} catch (Exception $e) {
				throw new Exception("API Request Error unable to json_decode API response: " . $result . ' | Request url: ' . $url);
			}
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if (isset($result_array->status_code) && $result_array->status_code >= 401 && $result_array->status_code != 407) {
				throw new Exception('Midtrans API is returning API error. HTTP status code: ' . $result_array->status_code . ' API response: ' . $result, $result_array->status_code);
			} elseif ($httpCode >= 400) {
				throw new Exception('Midtrans API is returning API error. HTTP status code: ' . $httpCode . ' API response: ' . $result, $httpCode);
			} else {
				return $result_array;
			}

			// $result_array = json_decode($result);
			// if (!in_array($result_array->status_code, array(200, 201, 202, 407))) {
			// 	$message = 'Veritrans Error (' . $result_array->status_code . '): '
			// 		. $result_array->status_message;
			// 	throw new Exception($message, $result_array->status_code);
			// } else {
			// 	return $result_array;
			// }
		}
	}

	public static function vtweb_charge($payloads)
	{

		$result = Veritrans::post(
			Veritrans::getBaseUrl() . '/charge',
			Veritrans::$serverKey,
			$payloads
		);

		return $result->redirect_url;


		//$url = Veritrans::getBaseUrl();
		//return Veritrans::$serverKey.Veritrans::getBaseUrl() . '/charge' ;
	}

	public static function vtdirect_charge($payloads)
	{

		$result = Veritrans::post(
			Veritrans::getBaseUrl() . '/v2/charge',
			Veritrans::$serverKey,
			$payloads
		);

		return $result;


		//$url = Veritrans::getBaseUrl();
		//return Veritrans::$serverKey.Veritrans::getBaseUrl() . '/charge' ;
	}

	/**
	 * Retrieve transaction status
	 * @param string $id Order ID or transaction ID
	 * @return mixed[]
	 */
	public static function status($id)
	{
		return Veritrans::get(
			Veritrans::getBaseUrl() . '/' . $id . '/status',
			Veritrans::$serverKey,
			false
		);
	}

	/**
	 * Appove challenge transaction
	 * @param string $id Order ID or transaction ID
	 * @return string
	 */
	public static function approve($id)
	{
		return Veritrans::post(
			Veritrans::getBaseUrl() . '/' . $id . '/approve',
			Veritrans::$serverKey,
			false
		)->status_code;
	}

	/**
	 * Cancel transaction before it's setteled
	 * @param string $id Order ID or transaction ID
	 * @return string
	 */
	public static function cancel($id)
	{
		return Veritrans::post(
			Veritrans::getBaseUrl() . '/' . $id . '/cancel',
			Veritrans::$serverKey,
			false
		)->status_code;
	}

	/**
	 * Expire transaction before it's setteled
	 * @param string $id Order ID or transaction ID
	 * @return mixed[]
	 */
	public static function expire($id)
	{
		return Veritrans::post(
			Veritrans::getBaseUrl() . '/' . $id . '/expire',
			Veritrans::$serverKey,
			false
		);
	}
}
