<html lang="en">
	<head>
		<link type="text/css" href="<?php echo base_url('components/icons.css')?>" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('materialize/css/materialize.css') ?>"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('components/style.css')?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>PENSync - Informasi Ruangan</title>
	</head>
    <script>
        $(document).ready(function(){
            $('.materialboxed').materialbox();
        });
    </script>
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
			        <li><a href="<?php echo site_url('Pensync') ?>">Beranda</a></li>
			        <li class="active"><a href="#">Informasi Ruangan</a></li>
			        <li><a href="#kontak" class="modal-trigger" data-target="kontak">Kontak</a></li>
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
		<section id="banner" style="overflow: auto; position: fixed;">
			<div class="row">
				<div class="col m1"></div>
				<div class="col m10">
					<div class="card white">
						<div class="card-content black-text">
							<span class="card-title">Informasi Ruangan</span>
							<ul class="collapsible collapsible-accordion" data-collapsible="expandable">
								<?php
								if (isset($room_data)) {
									foreach ($room_data as $room) {
										echo "<li>";
										echo "<div class='collapsible-header' style='font-weight: bold; color: #e53935;'>".$room->nama."</div>";
										echo "<div class='collapsible-body'>";
                                        $image = explode("||", $room->link_room);
                                        echo "<table border='1'><tr>";
                                        foreach($image as $src) {                                            
                                            echo "<td><img class='materialboxed' data-caption='$room->nama' src='".base_url('components/room'.$src)."' width='100%'></td>";
                                        }
                                        echo "</tr></table>";
                                        echo "</div>";
										echo "</li>";
									}
								}
								?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col m1"></div>
			</div>
		</section>
	</body>
</html>