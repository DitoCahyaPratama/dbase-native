<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="..\..\assets\css\bootstrap.min.css">
	<link rel="stylesheet" href="..\..\assets\css\bootstrap.css">
	<link rel="icon" type="image/jpeg" href="../../images/Icon_DBase.jpg">
	<link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.min.css">
	<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="style_sesudah.css" rel="stylesheet">
	<script src="../../script/jquery-3.2.1.min.js"></script>
	<script src="../../assets\js\bootstrap.min.js"></script>
	<script src="ajaxku.js"></script>

</head>
<body style="background: #ffffff;">
	<?php
		include '../../config/koneksi.php';
		include '../../header.php';
		include '../../footer.php';

	?>
	<div class="container">
	<div class="row">
		<div class="span6 offset2">
			
		</div>	
		<div class="span2">
			
		</div>
	</div>
	<div class="row">
		<div class="span6 offset2">
				<div id="boxpesan">
				</div>
		</div>
		<div class="span2">
				<div class="boxonline">
				</div>
		</div>
	</div>
	</br>
	<div class="row">
		<div class="span6 offset2">
			<form method="post" action="" id="formpesan" class="form-inline">
			<input type="text" name="uname" class="uname" value="<?php echo $_GET['Uname']; ?>" readonly>
			<input class="input-xlarge" name="pesan" type="text" placeholder="Ketik Pesan kemudian Enter !" required x-moz-errormessage="Ketik pesannya gan !">
			<input type='submit' value='Kirim' class='btn btn-info pull-right' id='pencet'>
			</form>
		<audio controls id="suara">
		<source src="chat.mp3" type="audio/mpeg">
		Your browser does not support the audio element.
		</audio>
		</div>
	</div>
</html>