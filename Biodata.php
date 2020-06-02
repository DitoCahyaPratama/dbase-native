<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets\css\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
	<link rel="icon" type="image/jpeg" href="images/Icon_DBase.jpg">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
  	<script src="script/jquery-3.2.1.min.js"></script>
  	<script src="assets\js\bootstrap.min.js"></script>
  	
  	<script src="assets/js/jquery.dataTables.min.js"></script>
  	<script src="assets/js/dataTables.bootstrap.min.js"></script>	
</head>
<?php
	function rupiah($angka){
		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;
	}
?>
<body style="background: #ffffff;">
	<?php
		include 'config/koneksi.php';
		include 'header.php';
		include 'footer.php';
		$Id_User = $_GET['Id_User'];
 		$amblProfPeg = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_ProfPeg WHERE Id_User='$Id_User'"));
 		$NoPeg = $amblProfPeg['NoPeg'];
 		$NmPeg = $amblProfPeg['NmPeg'];
 		$amblBioPeg = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_BioPeg WHERE NoPeg='$NoPeg'"));
 		$Almt = $amblBioPeg['Almt'];
 		$Jbtn = $amblBioPeg['Jbtn'];
 		$NoTelp = $amblBioPeg['NoTelp'];
 		$Agama = $amblBioPeg['Agm'];
 		$Email = $amblBioPeg['Email'];
 		$NoKtp = $amblBioPeg['NoKTP'];
 		$StsNkh = $amblBioPeg['StsNkh'];
 		$PndAkr = $amblBioPeg['PndAkr'];
 		$JmlhAnak = $amblBioPeg['JmlhAnak'];
 		$GolDar = $amblBioPeg['GolDar'];
 		$Kewarganegaraan = $amblBioPeg['Kewarganegaraan'];
 		$amblJabatanPeg = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_Jbtn WHERE IdJbtn='$Jbtn'"));
 		$NmJbtn = $amblJabatanPeg['NmJbtn'];
 		$Level = $amblJabatanPeg['Level'];
 		$Jabatan = $NmJbtn .' - '. $Level;

	?>
	<div class="container">
		<div class="row">
			<div class="col-md-3" style="background: #2980b9;padding:25px;" width="100%" height="100%">
				<img src="images/User.jpg" style="border-radius: 50%">
				<label style="color:white;font-size: 30px;font-family: Lato-Black;"><?php echo $NmPeg ?></label><hr>
				<label style="color:white;font-size: 20px;font-family: Lato;"><?php echo $Jabatan ?></label>
			</div>
			<div class="col-md-9" style="text-align: left; background: #3498da;padding:60px;" width="100%" height="100%">
				<table>
					<tr>
						<td><span><i class="fa fa-user" style="color:#f39c12"></i></span>.....</td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 20px">DATA PRIBADI</label></td>
					</tr>
					<tr>
						<td></td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px">Alamat</label></td>
						<td style="color:#fff;">:</td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px"> <?php echo $Almt ?></label></td>
					</tr>
					<tr>
						<td></td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px">Kewarganegaraan</label></td>
						<td style="color:#fff;">:</td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px"> <?php echo $Kewarganegaraan ?></label></td>
					</tr>
					<tr>
						<td></td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px">Agama</label></td>
						<td style="color:#fff;">:</td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px"> <?php echo $Agama ?></label></td>
					</tr>
					<tr>
						<td></td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px">No KTP</label></td>
						<td style="color:#fff;">:</td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px"> <?php echo $NoKtp ?></label></td>
					</tr>
					<tr>
						<td></td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px">No Telefon</label></td>
						<td style="color:#fff;">:</td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px"> <?php echo $NoTelp ?></label></td>
					</tr>
					<tr>
						<td></td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px">Email</label></td>
						<td style="color:#fff;">:</td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px"> <?php echo $Email; ?></label></td>
					</tr>
					<tr>
						<td colspan="4"><hr></td>
					</tr>
					<tr>
						<td><span><i class="fa fa-user" style="color:#f39c12"></i></span>.....</td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 20px">TENTANG SAYA</label></td>
					</tr>
					<tr>
						<td></td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px">Pendidikan Akhir</label></td>
						<td style="color:#fff;">:</td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px"> <?php echo $PndAkr; ?></label></td>
					</tr>
					<tr>
						<td></td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px">Status Nikah</label></td>
						<td style="color:#fff;">:</td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px"> <?php echo $StsNkh; ?></label></td>
					</tr>
					<tr>
						<td></td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px">Jumlah Anak</label></td>
						<td style="color:#fff;">:</td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px"> <?php echo $JmlhAnak; ?></label></td>
					</tr>
					<tr>
						<td></td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px">Golongan Darah</label></td>
						<td style="color:#fff;">:</td>
						<td><label style="color:#fff;font-family: Lato-black;font-size: 18px"> <?php echo $GolDar; ?></label></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<script src="script/script.js"></script>
</body>
</html>