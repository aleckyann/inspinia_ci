<!DOCTYPE html>
<html lang="pt_br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Aleck Yann Mattos">
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="GetDoctors - Um médico pra chamar de seu!" />
	<link rel=”canonical” href="<?= base_url() ?>" />
    <title><?= $title ?></title>

    <!-- START BASE -->
    <script charset="utf-8"	src="<?= base_url('node_modules/jquery/dist/jquery.min.js') ?>" ></script>
    <link rel="stylesheet" 	href="<?= base_url('node_modules/izimodal/css/iziModal.min.css') ?>">
    <link rel="stylesheet" 	href="<?= base_url('node_modules/bootstrap/dist/css/bootstrap.min.css') ?>" >
    <link rel="stylesheet"	href="<?= base_url('node_modules/font-awesome/css/font-awesome.min.css') ?>" >
    <link rel="stylesheet" 	href="<?= base_url('node_modules/animate.css/animate.min.css') ?>">
    <link rel="stylesheet" 	href="<?= base_url() ?>public/css/main.css">
	<link rel="stylesheet" 	href="<?= base_url() ?>public/css/presets/preset1.css" id="preset">
    <link rel="stylesheet" 	href="<?= base_url() ?>public/css/responsive.css">

	<!-- START FONTS -->
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'>

	<!-- START FAVICONS -->
	<link rel="icon" href="<?= base_url() ?>public/images/ico/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url() ?>public/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url() ?>public/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url() ?>public/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url() ?>public/images/ico/apple-touch-icon-57-precomposed.png">

	<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" charset="utf-8"></script>
	<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js" charset="utf-8"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">

<!-- OTHERS PLATAFORMS-->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script>
//ANALYTICS
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-67512914-2', 'auto');
	ga('send', 'pageview');
</script>


  </head>
  <body class="animated fadeIn">
  	<section class="clearfix ad-profile-page" style="background-color:#10AC5C">
		<div class="container">
			<div class="breadcrumb-section">
				<ol class="breadcrumb">
					<li><a href="<?= base_url() ?>">Home</a></li>
					<li><?= use_uri_segment($this->uri->segment(2)) ?></li>
				</ol>
				<h2 class="title"><?= titulo($this->uri->segment(2)) ?></h2>
			</div><!-- breadcrumb-section -->

			<div class="job-profile section">
				<div class="user-profile">
                    <div class="col-sm-2 pull-right">
                        <div class="my-ads">
                            <a class="btn btn-danger radius0" href="<?= base_url('inautenticar') ?>">Sair</a>
                        </div>
                    </div>
					<div class="col-sm-2"><br>
						<img src="<?= $this->session->userdata('foto') ?>" style="max-width:80%" onclick="$('#usuario_foto').click(); return false;" class="img-circle pointer" alt="Clique para alterar sua foto!" title="Clique para alterar sua foto!">
					</div>

					<div class="col-sm-8">
						<h2>Olá, <a href><?= $nome ?></a></h2>
						<h5>Você logou pela última vez no dia <?= $this->session->ultimo_login ?></h5>
						<!-- FOTO -->
						<form action="<?= base_url('paciente/perfil/atualizar-foto-usuario') ?>" method="post" enctype="multipart/form-data">
							<input type="hidden" name="<?= $csrf_name ?>" value="<?= $csrf_hash ?>" />
							<input type="file" name="usuario_foto" class="btn-file" id="usuario_foto" style="display:none" required>
							<button title="Atualizar foto" type="submit" class="btn btn-xs btn-success radius0" onclick="if($('#usuario_foto').val() == ''){alert('Primeiro clique sobre a área da foto para escolher uma nova imagem.')}"><i class="fa fa-save"></i> <small>Atualizar foto</small></button>
						</form>
						<!-- FOTO -->
					</div>

				</div><!-- user-profile -->

                <br>
                
				<ul class="user-menu">
					<li <?= active($this->uri->segment(2), 'perfil') ?> ><a href="<?= base_url('paciente/perfil') ?>">Perfil</a></li>
					<li <?= active($this->uri->segment(2), 'atendimentos') ?> ><a href="<?= base_url('paciente/atendimentos') ?>">Registros de atendimentos</a></li>
					<li <?= active($this->uri->segment(2), 'prontuario') ?> ><a onclick="alert('Recomendações médicas: BETA'); return false;" href="<?= base_url('paciente/atendimentos') ?>">Recomendações médicas</a> <small class="text-danger"><i>BETA</i></small></li>
					<li <?= active($this->uri->segment(2), 'pagamentos') ?> ><a onclick="alert('Ajuda: Beta'); return false;" href="<?= base_url('paciente/atendimentos') ?>">Ajuda</a> <small class="text-danger"><i>BETA</i></small></li>
					<li <?= active($this->uri->segment(2), 'solicitar-atendimento') ?> ><a href="<?= base_url('paciente/solicitar-atendimento') ?>" style="color:#2A6E8B"><i class="fa fa-user-md" aria-hidden="true"></i> Solicitar atendimento médico</a></li>
				</ul>
			</div><!-- ad-profile -->

			<br>

            <div class="profile job-profile">
