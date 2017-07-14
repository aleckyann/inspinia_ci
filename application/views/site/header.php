<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('public/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="<?= base_url('public/css/animate.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('public/css/style.css') ?>" rel="stylesheet">
</head>
<body id="page-top" class="landing-page no-skin-config">
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">Tech2Health</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="page-scroll" href="#page-top">Home</a></li>
                        <li><a class="page-scroll" href="#features">Features</a></li>
                        <li><a class="page-scroll" href="#team">Produtos</a></li>
                        <li><a class="page-scroll" href="#testimonials">Clientes</a></li>
                        <li><a class="page-scroll" href="#pricing">Planos</a></li>
                        <li><a class="page-scroll" href="#contact">Contato</a></li>
                        <li><a href="<?= base_url('login') ?>">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</div>
