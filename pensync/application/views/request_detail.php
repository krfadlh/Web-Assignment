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
							<span class="card-title" style="margin-bottom: 5px;">
								Peminjaman Ruangan
								<div class="chip right" style="margin-top: 7px;">
									<img alt="status" src="<?php echo base_url('components/status/'.$request[0]->req_stats.'.png') ?>">
									<?php echo $request[0]->status ?>
								</div>
							</span>
							<div style="margin: 0px 25px;">
								<table class="highlight">
									<tbody>
										<tr>
											<td style="font-weight: bold;">Nama Kegiatan</td>
											<td>:</td>
											<td><?php echo $request[0]->event; ?></td>
										</tr>
										<tr>
											<td style="font-weight: bold;">Kategori Kegiatan</td>
											<td>:</td>
											<td><?php echo $request[0]->type; ?></td>
										</tr>
										<tr>
											<td style="font-weight: bold;">Penyelenggara</td>
											<td>:</td>
											<td><?php echo $request[0]->name; ?></td>
										</tr>
										<tr>
											<td style="font-weight: bold;">Penanggung Jawab</td>
											<td>:</td>
											<td><?php echo $request[0]->pj.' ('.$request[0]->nrp.')'; ?></td>
										</tr>
										<tr>
											<td style="font-weight: bold;">Tempat</td>
											<td>:</td>
											<td><?php echo $request[0]->nama; ?></td>
										</tr>
										<tr>
											<td style="font-weight: bold;">Tanggal Kegiatan</td>
											<td>:</td>
											<td><?php echo $request[0]->event_date; ?></td>
										</tr>
										<tr>
											<td style="font-weight: bold;">Waktu Kegiatan</td>
											<td>:</td>
											<td><?php echo $request[0]->start_time.' - '.$request[0]->finish_time; ?></td>
										</tr>
										<tr>
											<td style="font-weight: bold;">Kode Verifikasi</td>
											<td>:</td>
											<td><?php echo $request[0]->verif_code; ?></td>
										</tr>
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