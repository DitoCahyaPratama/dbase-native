<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets\css\bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.min.css">
	<link rel="icon" type="image/jpeg" href="images/Icon_DBase.jpg">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
  	<script src="script/jquery-3.2.1.min.js"></script>
  	<script src="assets\js\bootstrap.min.js"></script>
  	<script src="assets/js/jquery.dataTables.min.js"></script>
  	<script src="assets/js/dataTables.bootstrap.min.js"></script>	
  	<script type="text/javascript">
		$(document).ready(function(){
			$('.bln_Jrnl_Peg').keyup(function(){
				var text = $(this).val();

				if(text != '') $('td').parent().hide();
				else $('td').parent().show();

				$('td').filter(function(){
					return $(this).text().indexOf(text) !== -1;
				}).parent().show();
			});
		});
	</script>
</head>
<body style="background: #ffffff;">
	<?php
		include 'config/koneksi.php';
		include 'header.php';
		include 'footer.php';
		$Id_User = $_GET['Id_User'];
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-10 table-responsive">
				<form id="sidebar" action="cetak/cetak_jurnal_peg_pdf.php?Id_User=<?php echo $Id_User; ?>" method="POST">
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Waktu</th>
							<th>Bulan</th>
							<th>Tahun</th>
							<th>Ringkasan Jurnal</th>
							<th>Hasil Jurnal</th>
							<th width="50">Persentase Jurnal</th>
							<th>Status</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = 0;
						$tmplJrnlPeg = mysqli_query($dbcon,"SELECT * FROM tbl_Jrnl_Peg WHERE Id_Usr_Peg = '$Id_User'");
						while($tampilJrnlPeg=mysqli_fetch_array($tmplJrnlPeg)){
							$no++;
							?>
							<tr>
								<td id='td'><?php echo $no; ?></td>
								<td id='td'><?php echo $tampilJrnlPeg['wkt_jrnl_peg']; ?></td>
								<td id='td'><?php echo $tampilJrnlPeg['bln_jrnl_peg']; ?></td>
								<td id='td'><?php echo $tampilJrnlPeg['thn_jrnl_peg']; ?></td>
								<td id='td'><?php echo $tampilJrnlPeg['ringkasan_jrnl_peg']; ?></td>
								<td id='td'><?php echo $tampilJrnlPeg['hsl_jrnl_peg']; ?></td>
								<td id='td'><?php echo $tampilJrnlPeg['persentase_jrnl_peg']; ?></td>
								<td id='td'><?php echo $tampilJrnlPeg['sts_jrnl_peg']; ?></td>
								<td id='td'><?php echo $tampilJrnlPeg['ket_jrnl_peg']; ?></td>
							</tr>
							<?php
						}
					?>
					</tbody>
				</table>
				</br></br></br></br>
			</div>
			<div class="col-md-2">
					<div class="form-group">
						<label for="bln_jrnl_peg">Bulan :<span class="badge">(1-12)</span></label>
						<input type="hidden" name="id_usr_peg" id="id_usr_peg" value="<?php echo $id_usr_peg ?>">
						<input class="form-control bln_Jrnl_Peg" type="number" id="bln_Jrnl_Peg" name="bln_Jrnl_Peg" min="1" max="12" required="">
					</div>
					<button type="submit" id="ctkJrnlPeg" class="btn btn-success" name="ctkJrnlPeg">Cetak</button>
				</form>
			</div>
		</div>
	</div>

	<script src="script/script.js"></script>
</body>
</html>