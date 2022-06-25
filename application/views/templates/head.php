<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Top Navigation</title>

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/navbar.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/steps.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/sweetalert2.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" src="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

    <link rel="stylesheet" src="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">


    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/adminlte.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" src="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <!-- <script src="<?php echo base_url(); ?>assets/js/plugin/moment/min/moment.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" src="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

    <!-- Fonts and icons -->
    <script src="<?= base_url() ?>assets/js/plugin/webfont/webfont.min.js"></script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .radio-card label {
            padding: 0.7rem 1.2rem;
            border-radius: 0.3rem;
            border: 1px solid var(--primary);
            cursor: pointer;
            transition: var(--my-delay-2);
            width: 100%;
            position: relative;
            overflow: hidden;
            white-space: nowrap;
            text-align: center;
        }

        .radio-card label:hover {
            margin-top: -3px;
            box-shadow: 0 1px 3px var(--primary);
        }

        .radio-card .radio-check {
            opacity: 0;
        }

        .radio-card input:checked+label .radio-check {
            opacity: 1;
        }


        .radio-card .radio-check .bg-radio-check {
            background: var(--my-primary);
            transform: rotate(45deg);
            height: 50px;
            width: 25px;
            margin-top: -18px;
            margin-left: -5px;
        }

        .radio-card .radio-check,
        .radio-card .radio-check .bi-check {
            position: absolute;
            top: 0;
            left: 0;
        }

        .carousel-control-prev,
        .carousel-control-next {
            padding: 0 20px !important;
            width: auto !important
        }

        #trendingCarousel .carousel-inner {
            padding: 5px 3.5rem;
        }

        #trendingCarousel .carousel-control-prev,
        #trendingCarousel .carousel-control-next {
            color: inherit;
        }

        #trendingCarousel .carousel-indicators li {
            background-color: var(--my-primary) !important;
        }

        .my-img-carousel {
            height: 12rem;
            width: 100%;
            background-color: gray;
            border-radius: var(--my-rounded-1)
        }

        @media (min-width: 576px) {}

        @media (min-width: 768px) {
            .my-img-carousel {
                height: 15rem;
            }
        }

        @media (min-width: 992px) {
            .my-img-carousel {
                height: 18rem;
            }
        }

        @media (min-width: 1200px) {
            .my-img-carousel {
                height: 20rem;
            }
        }
    </style>
</head>