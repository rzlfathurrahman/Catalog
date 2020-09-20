<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="top_menu row m0">
			<div class="container-fluid">
				<div class="float-left">
					<p>
						<a href="https://api.whatsapp.com/send?phone=681229941133" target="_blank">
							<i class="fa fa-whatsapp"></i> 081229941133
						</a>
					</p>
				</div>
				<div class="float-right">
					<ul class="right_side">
						<li>
							<a href="<?= base_url(); ?>login" target="_blank">
								Login
							</a>
						</li>
						<li>
							<a href="https://www.instagram.com/mrdn.inc.catallogue/" target="_blank">
								<i class="fa fa-instagram"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-twitter"></i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-facebook"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg ">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="<?= base_url(); ?>">
						<img src="<?= base_url('/assets/user'); ?>/img/logo.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">
							<div class="col-lg-7 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">

								<?php if ($halaman == 'user/home'): ?>
									<li class="nav-item active">
								<?php else: ?>
									<li class="nav-item ">
								<?php endif; ?>
										<a class="nav-link" href="<?= base_url(); ?>">Home</a>
									</li>

								<?php if ($halaman == 'user/shop'): ?>
									<li class="nav-item active">
								<?php else: ?>
									<li class="nav-item">
								<?php endif ?>
										<a class="nav-link" href="<?= base_url('shop'); ?>">Shop</a>
									</li>

								<?php if($halaman ==  'user/contact'): ?>
									<li class="nav-item active">
								<?php else: ?>
									<li class="nav-item">
								<?php endif; ?>
										<a class="nav-link" href="<?= base_url('contact'); ?>">Contact</a>
									</li>

								<?php if($halaman ==  'user/aboutUs'): ?>
									<li class="nav-item active d-none">
								<?php else: ?>
									<li class="nav-item d-none">
								<?php endif; ?>
										<a class="nav-link" href="<?= base_url('aboutUs'); ?>">About Us</a>
									</li>
								</ul>
							</div>

							<div class="col-lg-5">
								<ul class="nav navbar-nav navbar-right right_nav pull-right">
									<hr>
									<li class="nav-item">
										<a href="<?= base_url('search'); ?>" class="icons">
											<i class="fa fa-search" aria-hidden="true"></i>
										</a>
									</li>
									<hr>
									<li class="nav-item">
										<a href="<?= base_url('shop/chartDetail'); ?>" class="icons">
											<i class="lnr lnr lnr-cart"></i>
										</a>
									</li>	
									<hr>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->