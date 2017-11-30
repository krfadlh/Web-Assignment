<html lang="en">
	<head>
		<link type="text/css" href="<?php echo base_url('components/icons.css')?>" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('materialize/css/materialize.css') ?>"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('components/style.css')?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>PENSync - Landing Page</title>
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
				<?php if ($this->session->has_userdata('logged_in')) {
			      	echo '<ul id="account" class="dropdown-content">';
			      	echo '<li><a href="#" style="text-align: center; color:#e53935;">('.$this->session->userdata('name').')</a></li>';
			      	echo '<li><a href="'.site_url('Pensync/setting').'" style="text-align: center; color:#000;">Setting</a></li>';
			      	echo '<li><a href="'.site_url('Pensync/logout').'" style="text-align: center; color:#000;">Logout</a></li>';
			      	echo '</ul>';
			    } ?>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
			        <li class="active"><a href="#">Beranda</a></li>
			        <li><a href="<?php echo site_url('Pensync/room_info') ?>">Informasi Ruangan</a></li>
			        <li><a href="#kontak" class="modal-trigger" data-target="kontak">Kontak</a></li>
			        <?php if ($this->session->has_userdata('logged_in')) {
			        	echo '<li><a class="dropdown-button" href="#" data-activates="account">Akun<i class="material-icons right">arrow_drop_down</i></a></li>';
			        } ?>
			    </ul>
			</div>
			<div class="col m1"></div>
		</nav>
		<div id="kontak" class="modal modal-fixed-footer">
			<div class="modal-content">
				<h4>Kontak</h4>
				<div class="divider" style="background-color: #e53935;"></div>
				<h5>Admin</h5>
				<div class="row">
					<div class="col m6">
						<table class="bordered highlight">
							<thead>
								<tr>
									<th data-field="nama">Nama</th>
									<th data-field="kontak">Kontak</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Pensync</td>
									<td>085730485464</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col m6">
						<table class="bordered highlight">
							<thead>
								<tr>
									<th data-field="nama">Nama</th>
									<th data-field="kontak">Kontak</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $admin_data[0]->name; ?></td>
									<td><?php echo $admin_data[0]->kontak; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<h5>Others</h5>
				<div class="row">
					<div class="col m6">
						<table class="bordered highlight">
							<thead>
								<tr>
									<th data-field="nama">Nama</th>
									<th data-field="kontak">Kontak</th>
								</tr>
							</thead>
							<tbody>
								<?php
								for ($i = 0; $i < count($kontak_data); $i += 2) { 
									echo "<tr>";
									echo "<td>".$kontak_data[$i]->name."</td>";
									echo "<td>".$kontak_data[$i]->kontak."</td>";
									echo "</tr>";
								} 
								?>
							</tbody>
						</table>
					</div>
					<div class="col m6">
						<table class="bordered highlight">
							<thead>
								<tr>
									<th data-field="nama">Nama</th>
									<th data-field="kontak">Kontak</th>
								</tr>
							</thead>
							<tbody>
								<?php
								for ($i = 1; $i < count($kontak_data); $i += 2) { 
									echo "<tr>";
									echo "<td>".$kontak_data[$i]->name."</td>";
									echo "<td>".$kontak_data[$i]->kontak."</td>";
									echo "</tr>";
								} 
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="modal-action modal-close waves-effect waves-light btn landing-button hoverable">Close</a>
			</div>
		</div>
		<section id="banner">
			<div class="row">
				<div class="col m5"></div>
				<div class="col m6">
					<?php
					if ($this->session->has_userdata('logged_in')) {
					 	echo '<h3 class="landing-title">Selamat datang '.$this->session->userdata('name').'</h3>';
					} else {
						echo '<h3 class="landing-title">Sinkronisasi Ruangan</h3>';
					}
					?>
					<p class="landing-p">Web yang memudahkan organisasi mahasiswa dan mahasiswa PENS
					<br>dalam peminjaman ruang kelas PENS</p>
					<div class="row">
						<div class="col m6">
							<a class="waves-effect waves-red red btn landing-button-white right hoverable" href="<?php echo site_url('Pensync/lihat') ?>"><div style="margin-top: -2px;">Lihat</div></a>
						</div>
						<div class="col m6">
							<?php 
							if ($this->session->has_userdata('logged_in')) {
								if ($this->session->userdata('level') == 'admin') {
									echo '<a class="waves-effect waves-light red btn landing-button left hoverable" href="#report">Rekap</a>';
								} else {
									echo '<a class="waves-effect waves-light red btn landing-button left hoverable" href="'.site_url('Pensync/pinjam').'">Pinjam</a>';
								}
							} else {
								echo '<a class="waves-effect waves-light red btn landing-button left hoverable" href="'.site_url('Pensync/login').'">Login</a>';
							}
							?>
							<div id="report" class="modal">
								<div class="modal-content">
									<h5>Rekap Peminjaman / Bulan</h5>
									<div class="row">
										<div class="col m6">
											<center>
												<?php 
												if (isset($total_request)) {
													$months = array('Januar1', 'Februar1', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
													echo '<p><b>'.$months[date('m', strtotime('last month')) - 1].date(' Y', strtotime('last month')).'</b></p>';
													echo '<a class="waves-effect waves-light red btn landing-button" href="'.site_url('Pensync/report/0').'">Download<i class="material-icons right">file_download</i></a>';
													echo '<p>Total '.$total_request['last_month'].' peminjaman</p>';
												}
												?>
											</center>
										</div>
										<div class="col m6">
											<center>
												<?php 
												if (isset($total_request)) {
													$months = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
													echo '<p><b>'.$months[date('m') - 1].date(' Y').'</b></p>';
													echo '<a class="waves-effect waves-light red btn landing-button" href="'.site_url('Pensync/report/1').'">Download<i class="material-icons right">file_download</i></a>';
													echo '<p>Total '.$total_request['now'].' peminjaman</p>';
												}
												?>
											</center>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col m1"></div>
			</div>
		</section>
		<section id="whats-inside">
			<br><br><br>
			<center><h4 style="font-weight: bold;">What's Inside</h4></center>
			<br><br>
			<div class="row">
				<div class="col m4">
					<div class="card white hoverable">
						<div class="card-content black-text">
							<center>
								<div class="frame-red">
									<img src="<?php echo base_url('components/list.png') ?>" class="whats-inside-pict" style="height: 29%;">
								</div><br>
								<p><b>Data Ruangan</b></p>
								<p>Menampilkan data ruangan dan peminjaman ruangan mahasiswa PENS beserta fasilitas yang tersedia di setiap ruangan</p>
							</center>
						</div>
					</div>
				</div>
				<div class="col m4">
					<div class="card white hoverable">
						<div class="card-content black-text">
							<center>
								<div class="frame-black">
									<img src="<?php echo base_url('components/human-group-with-questions-and-doubts.png') ?>" class="whats-inside-pict">
								</div><br>
								<p><b>Peminjaman Ruangan</b></p>
								<p>Perwakilan Ormawa dan UKM PENS bisa melakukan peminjaman ruang untuk kegiatan diluar jam kuliah menggunakan user yang diberikan</p>
							</center>
						</div>
					</div>
				</div>
				<div class="col m4">
					<div class="card white hoverable">
						<div class="card-content black-text">
							<center>
								<div class="frame-red">
									<img src="<?php echo base_url('components/locked.png') ?>" class="whats-inside-pict" style="height: 29%;">
								</div><br>
								<p><b>Konfirmasi Peminjaman</b></p>
								<p>Menutup peminjaman ruangan ketika sudah ada Ormawa atau UKM PENS yang sudah meminjam terlebih dahulu sesuai dengan pertimbangan prioritas kegiatan</p>
							</center>
						</div>
					</div>
				</div>
			</div>
		</section>
		<footer>
			<center>
				<br><br>
				<p style="font-weight: bold;" class="white-text">Stay connected with us at the link below</p>
				<div class="row">
					<div class="col m5">
						<a href="#" class="brand-logo right" style="margin-left: 0; font-size: 200%">
							<span class="black-text">PEN</span><span style="color: #E74C3C;">Sync</span>
						</a>
					</div>
					<div class="col m7">
						<p style="font-size: 150%; margin-top: 5px;" class="white-text left"> | Copyright© pensync.pens.ac.id,16</p>
					</div>
				</div>
			</center>
		</footer>
	</body>
</html>