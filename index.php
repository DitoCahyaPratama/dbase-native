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
  	<script type="text/javascript" src="script\script.js"></script>
</head>
<body style="background: #fff;">
	<?php
		include 'config/koneksi.php';
		include 'header.php';
		include 'modal/mdl-logout.php';
		include 'modal/mdl-slide.html';
		include 'ambil-data.php';
		include 'footer.php';
	?>
	<?php
		$eksekusi_sts = mysqli_query($dbcon,"SELECT * FROM tbl_user WHERE Id_User='$Id_User'");
		$skseks = mysqli_fetch_array($eksekusi_sts);
		$sks_sts = $skseks['Lvl'];
		if($sks_sts == '1' && isset($_SESSION['username'])){
			?>
			<div class="container-fluid">
				<nav class="menu-navigation-dark">
    				<a href="data/admin/tambah-data.php?Id_User=<?php echo $id; ?>&Uname=<?php echo $username; ?>&click=tambah_data"><i class="fa fa-plus"></i><span>Tambah Data</span></a>
    				<a href="data/chat/index.php?Id_User=<?php echo $id; ?>&Uname=<?php echo $username; ?>&click=chatadmin"><i class="fa fa-comments"></i><span>Chat</span></a>
    				<a href="data/admin/komentar.php?Id_User=<?php echo $id; ?>&Uname=<?php echo $username; ?>&click=komentar"><i class="fa fa-comment"></i><span>Komentar</span></a>
				</nav>
			</div>
			<?php
		}else if($sks_sts == '2' && isset($_SESSION['username'])){
			?>
			<div class="container-fluid">
				<nav class="menu-navigation-dark">
    				<a href="entri_jurnal_peg.php?Id_User=<?php echo $id; ?>&Uname=<?php echo $username; ?>&click=entri_jurnal_peg"><i class="fa fa-edit"></i><span>Jurnal</span></a>
    				<a href="cetak_jurnal_peg.php?Id_User=<?php echo $id; ?>&Uname=<?php echo $username; ?>&click=entri_jurnal_peg"><i class="fa fa-print"></i><span>Cetak Jurnal</span></a>
    				<a href="data/chat/index.php?Id_User=<?php echo $id; ?>&Uname=<?php echo $username; ?>&click=chat"><i class="fa fa-comment" ></i><span>Chat</span></a>
    				<a href="cetak_Penghasilan.php?Id_User=<?php echo $id; ?>&Uname=<?php echo $username; ?>&click=entri_jurnal_peg"><i class="fa fa-dollar"></i><span>Penghasilan</span></a>
    				<a href="Biodata.php?Id_User=<?php echo $id; ?>&Uname=<?php echo $username; ?>&click=entri_jurnal_peg"><i class="fa fa-user"></i><span>Biodata</span></a>
    				<a href="tentang.php?Id_User=<?php echo $id; ?>&Uname=<?php echo $username; ?>&click=tentang"><i class="fa fa-warning"></i><span>Tentang</span></a>
				</nav>
			</div>
			<?php
		}else if($sks_sts == '3' && isset($_SESSION['username'])){
			?>
			<div class="container-fluid">
				<nav class="menu-navigation-dark">
    				<a href="data/manager/inv-peg.php?Id_User=<?php echo $id; ?>&Uname=<?php echo $username; ?>&click=inv-peg"><i class="fa fa-arrow-up"></i><span>Inventori Pegawai</span></a>
    				<a href="data/manager/Salary.php?Id_User=<?php echo $id; ?>&Uname=<?php echo $username; ?>&click=sal-peg"><i class="fa fa-dollar"></i><span>Salary</span></a>
    				<a href="data/manager/Absensi.php?Id_User=<?php echo $id; ?>&Uname=<?php echo $username; ?>&click=abs-peg"><i class="fa fa-pencil"></i><span>Absensi Pegawai</span></a>
    				<a href="data/chat/index.php?Id_User=<?php echo $id; ?>&Uname=<?php echo $username; ?>&click=chat"><i class="fa fa-comment"></i><span>Chat</span></a>
    				<a href="tentang.php?Id_User=<?php echo $id; ?>&Uname=<?php echo $username; ?>&click=tentang"><i class="fa fa-warning"></i><span>Tentang</span></a>
				</nav>
			</div>
			<?php
		}
	?>
</body>
</html>
