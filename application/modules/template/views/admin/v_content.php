<!-- Navbar -->
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
	<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
		<a class="navbar-brand brand-logo" href="#" style="font-size: 16px;color: cornflowerblue;font-weight: bold">
			PT. SHANE GUNA PERMATA
		</a>
		<a class="navbar-brand brand-logo-mini" href="#">
			<img src="<?=base_url('assets/admin/images/logo.png');?>" alt="logo" />
		</a>
	</div>
	<div class="navbar-menu-wrapper d-flex align-items-center">
		<ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
			<!-- <li class="nav-item">
				<a href="#" class="nav-link">Schedule
					<span class="badge badge-primary ml-1">New</span>
				</a>
			</li> -->
			<li class="nav-item active">
				<a href="<?= base_url('admin/report') ?>" class="nav-link">
				<i class="mdi mdi-elevation-rise"></i>Reports</a>
			</li>
			<!-- 
			<li class="nav-item">
				<a href="#" class="nav-link">
				<i class="mdi mdi-bookmark-plus-outline"></i>Score</a>
			</li> -->
		</ul>
		<ul class="navbar-nav navbar-nav-right">
			<!-- <li class="nav-item dropdown">
				<a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
					<i class="mdi mdi-file-document-box"></i>
					<span class="count">7</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
					<div class="dropdown-item">
						<p class="mb-0 font-weight-normal float-left">You have 7 unread mails
						</p>
						<span class="badge badge-info badge-pill float-right">View all</span>
					</div>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item preview-item">
						<div class="preview-thumbnail">
							<img src="<?=base_url('assets/admin/images/faces/face4.jpg');?>" alt="image" class="profile-pic">
						</div>
						<div class="preview-item-content flex-grow">
							<h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
							<span class="float-right font-weight-light small-text">1 Minutes ago</span>
							</h6>
							<p class="font-weight-light small-text">
								The meeting is cancelled
							</p>
						</div>
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item preview-item">
						<div class="preview-thumbnail">
							<img src="<?=base_url('assets/admin/images/faces/face2.jpg');?>" alt="image" class="profile-pic">
						</div>
						<div class="preview-item-content flex-grow">
							<h6 class="preview-subject ellipsis font-weight-medium text-dark">Tim Cook
							<span class="float-right font-weight-light small-text">15 Minutes ago</span>
							</h6>
							<p class="font-weight-light small-text">
								New product launch
							</p>
						</div>
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item preview-item">
						<div class="preview-thumbnail">
							<img src="<?=base_url('assets/admin/images/faces/face3.jpg');?>" alt="image" class="profile-pic">
						</div>
						<div class="preview-item-content flex-grow">
							<h6 class="preview-subject ellipsis font-weight-medium text-dark"> Johnson
							<span class="float-right font-weight-light small-text">18 Minutes ago</span>
							</h6>
							<p class="font-weight-light small-text">
								Upcoming board meeting
							</p>
						</div>
					</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
					<i class="mdi mdi-bell"></i>
					<span class="count">4</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
					<a class="dropdown-item">
						<p class="mb-0 font-weight-normal float-left">You have 4 new notifications
						</p>
						<span class="badge badge-pill badge-warning float-right">View all</span>
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item preview-item">
						<div class="preview-thumbnail">
							<div class="preview-icon bg-success">
								<i class="mdi mdi-alert-circle-outline mx-0"></i>
							</div>
						</div>
						<div class="preview-item-content">
							<h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
							<p class="font-weight-light small-text">
								Just now
							</p>
						</div>
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item preview-item">
						<div class="preview-thumbnail">
							<div class="preview-icon bg-warning">
								<i class="mdi mdi-comment-text-outline mx-0"></i>
							</div>
						</div>
						<div class="preview-item-content">
							<h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
							<p class="font-weight-light small-text">
								Private message
							</p>
						</div>
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item preview-item">
						<div class="preview-thumbnail">
							<div class="preview-icon bg-info">
								<i class="mdi mdi-email-outline mx-0"></i>
							</div>
						</div>
						<div class="preview-item-content">
							<h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
							<p class="font-weight-light small-text">
								2 days ago
							</p>
						</div>
					</a>
				</div>
			</li> -->
			<li class="nav-item dropdown d-none d-xl-inline-block">
				<a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
					<span class="profile-text">Hello, <?=$this->session->userdata('ses_nama');?> !</span>
					<img class="img-xs rounded-circle" src="<?=base_url('assets/admin/images/faces/face1.jpg');?>" alt="Profile image">
				</a>
				<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
					<a class="dropdown-item p-0">
						<div class="d-flex border-bottom">
							<div class="py-3 px-4 d-flex align-items-center justify-content-center">
								<i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
							</div>
							<div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
								<i class="mdi mdi-account-outline mr-0 text-gray"></i>
							</div>
							<div class="py-3 px-4 d-flex align-items-center justify-content-center">
								<i class="mdi mdi-alarm-check mr-0 text-gray"></i>
							</div>
						</div>
					</a>
					<!--<a class="dropdown-item" href="<?// site_url('auth/logout') ;?>">
						Ubah Password
					</a>-->
					<a class="dropdown-item" href="<?= site_url('auth/logout') ;?>">
						Sign Out
					</a>
				</div>
			</li>
		</ul>
		<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
		<span class="icon-menu"></span>
		</button>
	</div>
</nav>

<div class="container-fluid page-body-wrapper">
<!-- Sidebar -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
		<li class="nav-item nav-profile">
			<div class="nav-link">
				<div class="user-wrapper">
					<div class="profile-image">
						<img src="<?=base_url('assets/admin/images/faces/face1.jpg');?>" alt="profile image">
					</div>
					<div class="text-wrapper">
						<p class="profile-name"><?=$this->session->userdata('ses_nama');?></p>
						<div>
							<small class="designation text-muted"><?=$this->session->userdata('ses_role');?></small>
							<span class="status-indicator online"></span>
						</div>
					</div>
				</div>
				<a href="<?=site_url('admin/shipment/create/-1')?>" class="btn btn-success btn-block">New Shipments
				<i class="mdi mdi-plus"></i>
				</a>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?=site_url('admin/home')?>">
				<i class="menu-icon mdi mdi-television"></i>
				<span class="menu-title">Dashboard</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?=site_url('admin/shipment')?>">
				<i class="menu-icon mdi mdi-backup-restore"></i>
				<span class="menu-title">Shipments</span>
			</a>
		</li>
		<?php if (($this->session->userdata('ses_role')=="superuserdo") || ($this->session->userdata('ses_role')=="admin")): ?>
		<li class="nav-item">
			<a class="nav-link" data-toggle="collapse" href="#office" aria-expanded="false" aria-controls="ui-basic">
				<i class="menu-icon mdi mdi-content-copy"></i>
				<span class="menu-title">Office</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="office">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item">
						<a class="nav-link" href="<?=site_url('admin/users/create/-1')?>">Add New Office</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=site_url('admin/users')?>">Data Office</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=site_url('admin/level')?>">Bagian/Unit/Level</a>
					</li>
				</ul>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" data-toggle="collapse" href="#par" aria-expanded="false" aria-controls="ui-basic">
				<i class="menu-icon mdi mdi-content-copy"></i>
				<span class="menu-title">Parameters</span>
				<i class="menu-arrow"></i>
			</a>
			<div class="collapse" id="par">
				<ul class="nav flex-column sub-menu">
					<li class="nav-item">
						<a class="nav-link" href="<?=site_url('admin/parameter/type')?>">Service of Shipments</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?=site_url('admin/parameter/status')?>">Status of Shipments</a>
					</li>
				</ul>
			</div>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?=site_url('admin/slide')?>">
				<i class="menu-icon mdi mdi-backup-restore"></i>
				<span class="menu-title">Slide</span>
			</a>
		</li>
		<?php endif ?>
		<?php if ($this->session->userdata('ses_role')=="superuserdo"): ?>
			
		
		<li class="nav-item">
			<a class="nav-link" href="<?=site_url('admin/pages')?>">
				<i class="menu-icon mdi mdi-backup-restore"></i>
				<span class="menu-title">Pages</span>
			</a>
		</li>

		<?php endif ?>
		<li class="nav-item">
			<a class="nav-link" href="<?=site_url('admin/users/ubah_pass')?>">
				<i class="menu-icon mdi mdi-backup-restore"></i>
				<span class="menu-title">Ubah Password</span>
			</a>
		</li>
	</ul>
</nav>

<div class="main-panel">
	<div class="content-wrapper">