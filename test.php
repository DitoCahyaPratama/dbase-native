<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets\css\bootstrap.min.css">
	<link rel="icon" type="image/jpeg" href="images/Icon_DBase.jpg">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
  	<script src="script/jquery-3.2.1.min.js"></script>
  	<script src="assets\js\bootstrap.min.js"></script>
  	<script src="assets/js/jquery.dataTables.min.js"></script>
  	<script src="assets/js/dataTables.bootstrap.min.js"></script>	
</head>
<body style="background: #07b4f6;">
	
	<?php
		include 'config/koneksi.php';
		include 'config/ambil_data.php';
		include 'header.php';
		include 'modal/mdl-login.html';
		include 'modal/mdl-akun.php';
		include 'modal/mdl-logout.php';
		include 'modal/mdl-ambl-foto.php';
	?>
	<?php
		$eksekusi_sts = mysqli_query($dbcon,"SELECT * FROM tbl_user_peg WHERE id_usr_peg='$id_usr_peg'");
		$skseks = mysqli_fetch_array($eksekusi_sts);
		$sks_sts = $skseks['id_stts_peg'];
		if($sks_sts=='PegAct0001'){
			?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-9">
						<div class="imgcontainer">
						<?php
						$ambilfoto = mysqli_query($dbcon,"SELECT * FROM tbl_peg WHERE id_usr_peg='$id_usr_peg'");
						$ft_terambil = mysqli_fetch_array($ambilfoto);
						$ft_peg = $ft_terambil['ft_peg'];
						if($ft_peg){
							echo "<img src='images/user/".$ft_peg."' alt='Avatar' class='avatar'></br></br>";
						}else{
							echo "<img src='images/user.jpg' alt='Avatar' class='avatar'></br></br>";
						}
      				?>
      				<button class="btn btn-primary" onclick="document.getElementById('id04').style.display='block'">Ganti</button>
    			</div>
			</div>
			<div class="col-md-3">
				<form id="sidebar">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#dtdiri">Data</a></li>
						<li><a data-toggle="tab" href="#dtalm">Almt.</a></li>
						<li><a data-toggle="tab" href="#dtpend">Pend.</a></li>
						<li><a data-toggle="tab" href="#dtpengker">Peng. Kerja</a></li>	
					</ul>
					<div class="tab-content">
						<div id="dtdiri" class="tab-pane fade in active">
							<div class="form-group">
								<input type="hidden" name="id_usr_peg" id="id_usr_peg" class="form-control" value="<?php echo $id_usr_peg; ?>" />
								<label for="nip">NIP :</label>
								<input type="text" name="nip" id="nip" class="form-control" placeholder="Nomor Induk Pegawai ..." value="<?php echo $nip; ?>" readonly/>
							</div>
							<div class="form-group">
								<label for="nm_peg">Nama :</label>
								<input type="text" name="nm_peg" id="nm_peg" class="form-control" placeholder="Nama Lengkap ..." value="<?php echo $nm_peg; ?>" />
							</div>
							<div class="form-group">
								<label for="motto_peg">Motto :</label>
								<textarea name="motto_peg" id="motto_peg" class="form-control" placeholder="Motto ..."><?php echo $motto_peg; ?></textarea>
							</div>
							<div class="form-group">
								<label for="no_telp_peg">Telp :</label>
								<input type="text" name="no_telp_peg" id="no_telp_peg" class="form-control" placeholder="Nomor Telefon ..." value="<?php echo $no_telp_peg; ?>"  />
							</div>
							<div class="form-group">
								<label for="email_peg">E-mail :</label>
								<input type="text" name="email_peg" id="email_peg" class="form-control" placeholder="E-mail ..." value="<?php echo $email_peg; ?>"  />
							</div>
							<div class="form-group">
								<label for="no_whatsapp_peg">No.Whatsapp :</label>
								<input type="text" name="no_whatsapp_peg" id="no_whatsapp_peg" class="form-control" placeholder="No.Whatsapp ..." value="<?php echo $no_whatsapp_peg; ?>"  />
							</div>
							<div class="form-group">
								<label for="facebook_peg">Facebook :</label>
								<input type="text" name="facebook_peg" id="facebook_peg" class="form-control" placeholder="Facebook ..." value="<?php echo $facebook_peg; ?>"  />
							</div>
							<div class="form-group">
								<label for="instagram_peg">Instagram :</label>
								<input type="text" name="instagram_peg" id="instagram_peg" class="form-control" placeholder="Instagram ..." value="<?php echo $instagram_peg; ?>"  />
							</div>
							<div class="form-group">
								<label for="telegram_peg">Telegram :</label>
								<input type="text" name="telegram_peg" id="telegram_peg" class="form-control" placeholder="Telegram ..." value="<?php echo $telegram_peg; ?>"  />
							</div>
							<div class="form-group">
								<label for="username_peg">Username :</label>
								<input type="text" name="username_peg" id="username_peg" class="form-control" placeholder="Username akun ini ..." value="<?php echo $username_peg; ?>"  />
							</div>
						</div>
					</div>
					<button type="button" id="smpnbiouser" class="btn btn-primary" onclick="smpnBioUser()">Simpan</button>
				</form>
			</div>
		</div>
	</div>
	<?php
		}else if($sks_sts == 'ManAct0001' || $sks_sts == 'AdmAct0001'){
	?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9">
					<div class="imgcontainer">
						<?php
						$ambilfoto = mysqli_query($dbcon,"SELECT * FROM tbl_peg WHERE id_usr_peg='$id_usr_peg'");
						$ft_terambil = mysqli_fetch_array($ambilfoto);
						$ft_peg = $ft_terambil['ft_peg'];
						if($ft_peg){
							echo "<img src='images/user/".$ft_peg."' alt='Avatar' class='avatar'></br></br>";
						}else{
							echo "<img src='images/user.jpg' alt='Avatar' class='avatar'></br></br>";
						}
      					?>
      					<button class="btn btn-primary" onclick="document.getElementById('id04').style.display='block'">Ganti</button>
    				</div>
    				
    			</div>
    		</div>
    	</div>
	<?php
		}
	?>
	<script src="script/script.js"></script>
	<script type="text/javascript">
		tmplUsrPeg();
	</script>
</body>
</html>