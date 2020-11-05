<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?=$title;?></title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="<?=base_url('assets/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css');?>">
	<link rel="stylesheet" href="<?=base_url('assets/admin/vendors/iconfonts/puse-icons-feather/feather.css');?>">
	<link rel="stylesheet" href="<?=base_url('assets/admin/vendors/css/vendor.bundle.base.css');?>">
	<?php if($this->uri->segment(1)=='auth'):?>
	<link rel="stylesheet" href="<?=base_url('assets/admin/vendors/css/vendor.bundle.addons.css');?>">
	<?php endif?>
	<!-- endinject -->
	<!-- plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?=base_url('assets/admin/css/style.css');?>">
	<!-- endinject -->
	<link rel="shortcut icon" href="<?=base_url('assets/admin/images/favicon.png');?>" />

	<link href='<?=base_url('assets/admin/fullcalendar/main.css');?>' rel='stylesheet' />

</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
	<div class="container">
		<a class="navbar-brand" href="#"><img src="<?=base_url('assets/admin/images/logo.png');?>" style="width: 80px"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
			<?php if($this->session->userdata('masuk') == TRUE):?>
				<a class="nav-item nav-link" href="<?=site_url('admin')?>">Dashboard</a>

			<?php endif?>
				<a class="nav-item nav-link" href="<?=site_url('')?>">Jadwal</a>

				<?php if($this->session->userdata('masuk') != TRUE):?>
				<a class="nav-item nav-link" href="<?=site_url('auth/register')?>">Daftar</a>
				<a class="nav-item nav-link" href="<?=site_url('auth/login')?>">Masuk</a>
				<?php else:?>
				<a class="nav-item nav-link" href="#">Hallo, <?=$this->session->userdata('ses_nama');?> !</a>
				<a class="nav-item nav-link" href="<?=site_url('admin/booking/create/-1')?>">Pinjam Ruangan +</a>
	
				<a class="nav-item nav-link" href="<?=site_url('auth/logout')?>">Keluar</a>
					
				<?php endif?>
			</div>
			
		</div>
	</div>

</nav>
	<div class="container-scroller">