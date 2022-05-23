<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$url = 'https://apivouchergame.com/api/product';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_POST, true);
		// curl_setopt($ch, CURLOPT_USERPWD, "r35t4p12" . ":" . "8540c5ef27b4afdb197405dc551ce5b5bfcb73bb2");
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		$response = curl_exec($ch);

		// var_dump($response);
		// print_r($response);
		// die;

		$data = json_decode($response, true);
		// print_r($data['data']);
		// die;
		$result['data'] = $data['data']['service'];
		// var_dump($result['data']);
		// die;
		$this->load->view('test', $result);
	}
}
