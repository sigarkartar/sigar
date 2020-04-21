<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo_pln1.jpg') ?>">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <title><?= $title; ?></title>
</head>

<body style="font-family: sans-serif">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background: #44749d">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('user') ?>"><img src="<?= base_url('assets/img/logo_pln1.jpg') ?>" alt="" width="30"> PLN RUNGKUT SURABAYA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="<?= base_url('user') ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link" href="<?= base_url('user/history') ?>">History</a>
                    </li>
                    <li class="nav-item active mr-3">
                        <a class="nav-link tombol-logout" href="<?= base_url('auth/logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>