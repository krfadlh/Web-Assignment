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
				<div class="col m1"></div>
				<div class="col m10">
					<div class="card white" style="margin-top: 7%;height: 580px;overflow-y: auto;" onmouseover="validateSubmit()">
						<div class="card-content black-text">
							<span class="card-title" style="margin-bottom: 5px;">Pinjam Ruangan</span>
							<form method="post" action="<?php echo site_url('Pensync/addRequest')?>" style="margin-top: 25px;">
								<div class="input-field" style="margin: 0px 10px;">
									<i class="material-icons prefix">event</i>
									<input id="event-name" type="text" name="event-name">
									<label for="event-name">Nama acara</label>
								</div>
								<div class="row">
									<div class="col m6 input-field">
										<i class="material-icons prefix">home</i>
										<select id="room" name="room">
											<option style="color: #e53935;" value="" disabled selected="">Pilih ruangan</option>
											<?php
											if(isset($room_data)) {
												foreach ($room_data as $room) {
													echo '<option value="'.$room->roomid.'">'.$room->nama.'</option>';
												}
											}
											?>
										</select>
										<label for="#room">Tempat</label>
									</div>
									<div class="col m6 input-field">
										<i class="material-icons prefix">list</i>
										<select style="color: #e53935;" id="event-type" name="event-type">
											<option value="" disabled selected="">Pilih kategori</option>
											<?php
											if(isset($event_type_data)) {
												foreach ($event_type_data as $event_type) {
													echo '<option value="'.$event_type->type.'">'.$event_type->info.'</option>';
												}
											}
											?>
										</select>
										<label for="event-type">Kategori acara</label>
									</div>
								</div>
								<div class="input-field" style="margin: 0px 10px;">
									<i class="material-icons prefix">date_range</i>
									<input type="text" class="datepicker" id="tanggal" name="tanggal" onchange="setStartTime()">
									<label for="#tanggal" id="label-tanggal">Tanggal</label>
								</div>
								<div id="validasi-tanggal"><p style="color: #e53935;"><br></p></div>
								<div class="row">
									<div class="input-field col m6">
										<i class="material-icons prefix">schedule</i>
										<select id="start-time" name="start-time" onchange="setFinishTime()" disabled>
											<option style="color: #e53935;" value="" disabled selected="">Pilih jam mulai</option>
										</select>
										<label for="#start-time">Jam mulai</label>
									</div>
									<div class="input-field col m6">
										<i class="material-icons prefix">schedule</i>
										<select id="finish-time" name="finish-time" disabled>
											<option style="color: #e53935;" value="" disabled selected="">Pilih jam selesai</option>
										</select>
										<label for="#finish-time">Jam selesai</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col m6">
										<i class="material-icons prefix">account_circle</i>
										<input id="pj" type="text" name="pj">
										<label for="#pj">Penanggung jawab</label>
									</div>
									<div class="input-field col m6">
										<i class="material-icons prefix">subject</i>
										<input id="nrp" type="text" name="nrp">
										<label for="#nrp">NRP</label>
									</div>
								</div>
								<div class="input-field">
									<br>
									<center>
										<button id="submit-request" type="submit" class="waves-effect waves-light btn landing-button disabled">
										submit<i class="material-icons right">event_available</i>
										</button>
									</center>
								</div>
							</form>
							<p id="coba">
								<?php
								if ($this->session->flashdata('message') != null) {
								 	echo "dipakai ".$this->session->flashdata('message');
								 } else {
								 	echo "boleh digunakan";
								 }
								?>
							</p>
						</div>
					</div>
				</div>
				<div class="col m1"></div>
			</div>
		</section>
	</body>
</html>