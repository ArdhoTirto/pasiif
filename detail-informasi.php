<?php
	include 'koneksi.php';
	date_default_timezone_set("Asia/Jakarta");

	if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
    } else {
        die("ID tidak ditemukan.");
    }

	$informasi = mysqli_query($conn, "SELECT * FROM informasi WHERE id = '$id'");
	$d = mysqli_fetch_object($informasi);

	
    if (!$d) {
        die("Data informasi tidak ditemukan.");
    }

?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="assets/css/style-test.css">
		<title>Detail Informasi</title>
	</head>
	<body>
		<section class="about-1">
			<h1 id="h1"><?= substr($d->judul, 0, 50)?></h1>
				<div class="main-1">
					<img src="uploads/informasi/<?= $d->gambar?>" alt="">
						<div class="about-text-1">
							<p style="text-align: left;" class="text"><?= $d->keterangan ?></p>
						</div>
				</div>
			<a href="index.php" id="a"><button class="btn-back" type="button">Kembali</button></a>
		</section>

	
	<!-- <div class="about-section">
		<div class="inner-container">
			<h1 class="text-center">About Us</h1>
			<img src="uploads/identitas/<?= $d->foto_sekolah ?>" width="100%" class="image"> 
			<p class="text"><?= $d->tentang_sekolah ?></p>
		</div>
	</div> -->



	</body>
	</html>