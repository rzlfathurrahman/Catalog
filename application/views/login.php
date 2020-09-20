<!--================Home Banner Area =================-->
	<section class="banner_area d-none">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Login Page</h2>
					<div class="page_link">
						<a href="/">Home</a>
						<a href="/admin/login">Login</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php //$a = 1234; $pass = password_hash($a, PASSWORD_DEFAULT); var_dump($pass);exit; ?>
	<!--================End Home Banner Area =================-->
	<!--================Login Box Area =================-->
	<section class="login_box_area p_120" style="position: relative; line-height: 100px; margin-top: 100px;">
		<div class="container" id="loginBox">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="<?= base_url(); ?>assets/user/img/login.jpg" alt="">
						<div class="hover">
							<h4>Are you an Administrator?</h4>
							<p>Iif you aren't an administrator, please click the button bellow.</p>
							<a class="main_btn" href="<?= base_url(); ?>">Shop Now !</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
						<?= $this->session->flashdata('pesan');; ?>
						<form class="row login_form" action="<?= base_url(); ?>admin/auth/prosesLogin" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="username" placeholder="Username" value="<?= set_value('username') ?>">
								<?= form_error('username','<span class="small text-danger font-weight-bold pl-3">','</span>'); ?>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								<?= form_error('password','<span class="small text-danger font-weight-bold pl-3">','</span>'); ?>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Log In</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->