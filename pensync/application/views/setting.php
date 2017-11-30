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
					<div class="card white" style="margin-top: 16%;" onmouseover="validateChange()">
						<div class="card-content black-text">
							<span class="card-title">Account Setting</span>
							<form method="post" action="<?php echo site_url('Pensync/change_password_auth')?>">
								<div class="input-field">
									<i class="material-icons prefix">lock</i>
									<input id="old_password" type="password" name="old_password">
									<label for="old_password">Old Password</label>
								</div>
								<div class="input-field">
									<i class="material-icons prefix">lock</i>
									<input id="new_password" type="password" name="new_password">
									<label for="new_password">New Password</label>
								</div>
								<div class="input-field">
									<i class="material-icons prefix">lock</i>
									<input id="retype_password" type="password" name="retype_password">
									<label for="retype_password">Re-type Password</label>
								</div>
								<div class="input-field">
									<br>
									<center>
										<button id="submit-password" type="submit" class="waves-effect waves-light btn landing-button disabled">
											Change<i class="material-icons right">send</i>
										</button>
									</center>
								</div>
								<p><br>* Password minimal <b>8 karakter</b> dengan kombinasi <b>huruf dan angka</b>.</p>
							</form>
						</div>
					</div>
					<div id="message">
						<?php
						if ($this->session->flashdata('error') != null) {
							echo '<div class="card white" style="margin-top: 20px;">';
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