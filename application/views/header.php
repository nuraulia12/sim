<?php
	$level 	= $this->session->userdata('level');
	$nama	= $this->session->userdata('nama_pengguna');
	$jml_blm_proses = $this->db->get_where('tabel_request', ['proses' => 'Belum Diproses'])->num_rows();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<style>
		* {margin:0; padding:0;}

		body {
		background-color:#fff;
		font-family:Arial, Helvetica, sans-serif;
		color:#000;
		}

		nav {
		margin:auto;
		text-align: center;
		width: 100%;
		}

		nav ul ul {
		display: none;
		}

		nav ul li:hover > ul{
		display: block;
		width: 150px;
		}

		nav ul {
		background: #53bd84;
		padding: 0 20px;
		list-style: none;
		position: relative;
		display: inline-table;
		width: 100%;
		}

		nav ul:after {
		content: "";
		clear:both;
		display: block;
		}

		nav ul li{
		float:left;
		}

		nav ul li:hover{
		background:#666;
		}

		nav ul li:hover a{
		color:#fff;
		}

		nav ul li a{
		display: block;
		padding: 25px;
		color: #fff;
		text-decoration: none;
		}

		nav ul ul{
		background: #53bd84;
		border-radius: 0px;
		padding: 0;
		position: absolute;
		top:100%;
		z-index:1;
		}

		nav ul ul li{
		float:none;
		border-top: 1px solid #53bd84;
		border-bottom: 1px solid #53bd84;
		position: relative;
		}

		nav ul ul li a{
		padding: 15px 40px;
		color: #fff;
		}

		nav ul ul li a:hover{
		background-color: #666;

		}


    </style>
</head>
<body>
	<div>
		<nav>
			<ul>
				<?php

					if($level == 'DIREKTUR'){
				?>
					<li><a href="#">Laporan</a>
						<ul>
							<li><a href="<?php echo site_url('laporan/laporan_barang')?>">Laporan Barang</a></li>
							<li><a href="<?php echo site_url('laporan/laporan_request')?>">Laporan Permintaan Barang Dari Subunit</a></li>
							<li><a href="<?php echo site_url('laporan/laporan_permintaan')?>">Laporan Pengajuan Barang Ke RT</a></li>
						</ul>
					</li>

				<?php
					}elseif($level == 'SIM'){
				?>
					<li><a href="#">Master</a>
						<ul>
							<li><a href="<?php echo site_url('main/users_management')?>">Data Pengguna</a></li>
							<li><a href="<?php echo site_url('main/merk_management')?>">Data Merk Barang</a></li>
							<li><a href="<?php echo site_url('main/product_management')?>">Data Barang</a></li>
							<li><a href="<?php echo site_url('main/kriteria_management')?>">Data Kriteria</a></li>
						</ul>
					</li>
					<li><a href="#">Data</a>
						<ul>
							<li><a href="<?php echo site_url('main/request')?>">Data Permintaan Barang Dari Subunit (<?= $jml_blm_proses?>) </a></li>
							<li><a href="<?php echo site_url('permintaan')?>">Data Pengajuan Barang Ke RT</a></li>
						</ul>
					</li>
					<li><a href="#">Laporan</a>
						<ul>
							<li><a target="_blank" href="<?php echo site_url('laporan/laporan_barang')?>">Laporan Barang</a></li>
							<li><a target="_blank" href="<?php echo site_url('laporan/laporan_request')?>">Laporan Permintaan Barang Dari Subunit</a></li>
							<li><a target="_blank" href="<?php echo site_url('laporan/view_laporan_permintaan')?>">Laporan Pengajuan Barang ke RT</a></li>
						</ul>
					</li>

				<?php
					}elseif($level == 'RT'){
				?>
					<li><a href="#">Proses</a>
						<ul>
							<li><a href="<?php echo site_url('topsis/lihat') ?>">Lihat Pengajuan</a></li>
						</ul>
					</li>
					<li><a href="#">Laporan</a>
						<ul>
							<li><a target="_blank" href="<?php echo site_url('laporan/laporan_barang')?>">Laporan Barang</a></li>
							<li><a target="_blank" href="<?php echo site_url('laporan/laporan_request')?>">Laporan Permintaan Barang Dari Subunit</a></li>
							<li><a target="_blank" href="<?php echo site_url('laporan/laporan_permintaan')?>">Laporan Pengajuan Barang</a></li>
						</ul>
					</li>
					<!--<li><a href="#">Pengajuan</a>
						<ul>
							<li><a href="<?php echo site_url('permintaan')?>">Data Pengajuan Barang ke RT</a></li>
						</ul>
					</li>-->

				<?php
					}elseif($level == 'SUBUNIT'){
				?>
					<li><a href="#">Data</a>
						<ul>
							<li><a href="<?php echo site_url('main/product_management2')?>">Data Barang</a></li>
							<li><a href="<?php echo site_url('main/request_management2')?>">Data Permintaan Barang Ke SIM</a></li>
						</ul>
					</li>
					<li><a href="#">Hasil</a>
						<ul>
							<li><a href="<?php echo site_url('main/request_management3')?>">Hasil Permintaan Barang Ke SIM</a></li>
						</ul>
					</li>
				<?php
					}else{
				?>

				<?php
					}
				?>
				<li><a href="<?php echo site_url('login/logout')?>" onClick="return confirm ('Apakah Anda Yakin Akan Keluar ?')">Logout</a></li>
				<li>
					<a href="">Selamat Datang <?php echo $nama." ( ".$level." ) " ?></a>
				</li>
			</ul>
		</nav>
	</div>
