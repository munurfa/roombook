<!-- header -->
	<div class="header" id="home">
		<div class="content white agile-info">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
					
						<a class="navbar-brand" href="<?=base_url()?>home">
							
							
							<h4>
								<span>
									<img src="<?=base_url('assets/admin/images/logo.png');?>" style="width: 80px">
								</span>
							</h4>
						</a>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-2" id="link-effect-2">
							<?php $url=$this->uri->segment(3); ?>
							<ul class="nav navbar-nav">
								<li <?= ($url=='') ? "class='active'" : '' ; ?> >
									<a href="<?=base_url()?>home" class="effect-3">Home</a></li>
								
								<li <?= ($url=='tentang-kami') ? "class='active'" : '' ; ?>><a href="<?php echo base_url('pages/index/tentang-kami') ?>" class="effect-3">Tentang Kami</a></li>

								<li <?= ($url=='product-service') ? "class='active'" : '' ; ?>><a href="<?php echo base_url('pages/index/product-service') ?>" class="effect-3">Product & Service</a></li>
								<li <?= ($url=='hubungi-kami') ? "class='active'" : '' ; ?>><a href="<?php echo base_url('pages/index/hubungi-kami') ?>" class="effect-3">Hubungi Kami</a></li>
								<li <?= ($url=='hubungi-kami') ? "class='active'" : '' ; ?>><a href="<?php echo base_url('auth/login') ?>" class="effect-3">Login</a></li>
							</ul>
						</nav>
					</div>
					<!--/.navbar-collapse-->
					<!--/.navbar-->
				</div>
			</nav>
		</div>
	</div>