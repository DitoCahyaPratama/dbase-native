<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets\css\bootstrap.min.css">
	<link rel="icon" type="image/jpeg" href="images/Icon_DBase.jpg">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
  	<script src="script/jquery-3.2.1.min.js"></script>
  	<script src="assets\js\bootstrap.min.js"></script>
</head>
<body style="background: #ffffff;">
	<?php
		include 'config/koneksi.php';
		include 'header.php';
		include 'footer.php';
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9" style="text-align: left;">
				<div style="font-size: 35px;text-align: center;font-family: lato-black;color:#07b4f6;height:200px;">Tentang DBase
					<div style="font-size: 20px;">
					</br>DBase adalah suatu penyedia jasa pengembangan aplikasi sistem informasi yang khususnya untuk 
					suatu perusahaan.
					</div>
				</div></br>
				
				<div style="font-size:35px;font-family: lato-black;">
					Kirimkan saran anda !!
				</div>
				<form>
					<div class="form-group">
						<label for="Pengirim">Nama Anda</label>
						<input type="text" name="Pengirim" id="Pengirim" class="form-control" placeholder="Nama Anda ..." />
					</div>
					<div class="form-group">
						<label for="Kom">Komentar</label>
						<textarea name="Kom" id="Kom" class="form-control" placeholder="Komentar Anda ..." rows="9px"> </textarea>
					</div>
					<button class="btn btn-primary" type="button" onclick="smpnKom();">Kirim</button></br><hr>
				</form>
			</div>
			<div class="col-md-3">
				<label style="background-color:white; height:40px; width:100%; font-family: lato-black; font-size: 20px;">HUBUNGI KAMI</label>
				<br><br><label>
					<p>
						Jl. Gedhang Gablok</br>
						Malang – 65163</br>
						East Java – INDONESIA</br></br>
						<hr></br>
						Telp:</br></br>
						+62 8965 7390 200</br></br>
						<hr></br>
						Email:</br></br>
						ditocahyapratama717@gmail.com</br></br>
					</p>
				</label>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="script\script.js"></script>
</body>
</html>