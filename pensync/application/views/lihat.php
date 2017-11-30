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
					<div class="card white" style="margin-top: 8%; height: 85%; overflow-y: auto;">
						<div class="card-content black-text">
							<form method="post" action="<?php echo site_url('Pensync/lihat');?>">
								<div class="row">
									<div class="input-field col m10">
										<label for="date">Insert a date.....</label>
		  								<input type="text" class="datepicker" id="date" name="tanggal">
									</div>
									<div class="input-field col m2">
										<button type="submit" class="waves-effect waves-light btn landing-button">
											search<i class="material-icons right">search</i>
										</button>
									</div>
								</div>
							</form>
							<b><p style="text-align: right;">
								<?php
								if (isset($tanggal) && $tanggal != "") {
									echo "Tanggal : ".$tanggal;
								}
								?>
							</p></b>
							<div>
						      <table>
						        <thead>
						          <tr>
						              <th data-field="Ruangan">Ruangan</th>
						              <th data-field="Waktu">Waktu</th>
						              <th data-field="Acara">Acara</th>
						              <th data-field="Penyelenggara">Penyelenggara</th>
						              <?php
						              if ($this->session->userdata('level') == 'admin') {
						              	echo '<th data-field="">&nbsp;</th>';
						              }
						              ?>
						          </tr>
						        </thead>
						        <tbody>
						        <?php
								if(isset($request_data)){
									if ($request_data != null && $tanggal != "") {
										foreach ($request_data as $request) {
											echo '<tr>';
											echo '<td>'.$request->nama.'</td>';
											echo '<td>'.$request->start_time.' - '.$request->finish_time.'</td>';
											echo '<td>'.$request->event.'</td>';
											echo '<td>'.$request->name.'</td>';
											if ($this->session->userdata('level') == 'admin') {
												echo '<td><a class="waves-effect waves-light red btn landing-button" href="'.site_url('Pensync/request_detail/'.$request->reqid).'">detail</a></td>';
											}
											echo '</tr>';
										}
									} else {
										echo "<tr><td colspan='4'><center><b>Tidak ada peminjaman tempat pada hari ini.</b></center></td></tr>";
									}
								}
								?>
						        </tbody>
						      </table>
							</div>	
						</div>
					</div>
				</div>
				<div class="col m1"></div>
			</div>
		</section>
	</body>
</html>