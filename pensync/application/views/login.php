<html lang="en">
	<head>
		<link type="text/css" href="<?php echo base_url('components/icons.css')?>" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('materialize/css/materialize.css') ?>"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('components/style.css')?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>PENSync - Login</title>
	</head>
	<body>
		<script type="text/javascript" src="<?php echo base_url('materialize/js/jquery.js') ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('materialize/js/materialize.js') ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('components/script.js') ?>"></script>
		<nav class="row">
			<div class="col m1"></div>
			<div class="col m10 nav-wrapper white">
				<a href="#" class="left brand-logo">
					<span class="black-text">PEN</span><span style="color: #E74C3C;">Sync</span>
				</a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
			        <li class="active"><a href="<?php echo site_url('Pensync') ?>">Back</a></li>
			    </ul>
			</div>
			<div class="col m1"></div>
		</nav>
		<section id="banner">
			<div class="row">
				<div class="col m6"></div>
				<div class="col m5">
					<div class="card white" style="margin-top: 16%;">
						<div class="card-content black-text">
							<span class="card-title">Login Form</span>
							<form method="post" action="<?php echo site_url('Pensync/login_auth')?>">
								<div class="input-field">
									<i class="material-icons prefix">account_circle</i>
									<input id="username" type="text" name="username" checked="">
									<label for="username">Username</label>
								</div>
								<div class="input-field">
									<i class="material-icons prefix">lock</i>
									<input id="password" type="password" name="password">
									<label for="password">Password</label>
								</div>
								<div class="input-field row">
									<div class="col m6">
										<input id="user" type="radio" name="level" value="user" checked>
										<label for="user">User</label>
									</div>
									<div class="col m6">
										<input id="admin" type="radio" name="level" value="admin">
										<label for="admin">Admin</label>
									</div>
								</div>
								<div class="input-field">
									<br>
									<center>
										<a href="<?php echo site_url('Pensync/login_auth') ?>">
											<button type="submit" class="waves-effect waves-light btn landing-button">
												Login<i class="material-icons right">send</i>
											</button>
										</a>
									</center>
								</div>
							</form>
							<p><br>Lupa password? Hubungi <a href="<?php echo site_url('Pensync/#kontak') ?>" style="color: #e53935;">Admin</a></p>
						</div>
					</div>
					<div id="message">
						<?php
						if ($this->session->flashdata('error') != null) {
							echo '<div class="card white">';
							echo '<div class="card-content black-text">';
							echo '<p style="display: inline;">'.$this->session->flashdata('error').'</p>';
							echo '<button onclick="$('."'#message'".').empty()" class="waves-effect waves-light btn red right" style="margin-top: -7px;"><i class="material-icons ">clear</i></button>';
							echo '</div>';
							echo '</div>';
						} 
						?>
					</div>
				</div>
				<div class="col m1"></div>
			</div>
		</section>
	</body>
</html>