<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets\css\bootstrap.min.css">
	<link rel="icon" type="image/jpeg" href="images/Icon_DBase.jpg">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.min.css">
	<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
  	<script src="script/jquery-3.2.1.min.js"></script>
  	<script src="assets\js\bootstrap.min.js"></script>
  	<script src="assets/js/jquery.dataTables.min.js"></script>
  	<script src="assets/js/dataTables.bootstrap.min.js"></script>	
</head>
<body style="background: #ffffff;">
	
	<?php
		include 'config/koneksi.php';
		include 'header.php';
		include 'footer.php';
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-9 table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Waktu</th>
							<th>Ringkasan</th>
							<th>Hasil</th>
							<th width="50">Persentase</th>
							<th>Status</th>
							<th>Keterangan</th>
							<th width="70">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 0;
		$id_usr_peg = $_GET['Id_User'];
		$tmplJrnlPeg = mysqli_query($dbcon,"SELECT * FROM tbl_jrnl_peg WHERE id_usr_peg='$id_usr_peg' ORDER BY wkt_jrnl_peg");
		while($barisJrnlPeg = mysqli_fetch_array($tmplJrnlPeg)){
			$no++;
			echo "<tr>";
			echo "<td>".$no."</td>";
			echo "<td>".$barisJrnlPeg['wkt_jrnl_peg']."</td>";
			echo "<td>".$barisJrnlPeg['ringkasan_jrnl_peg']."</td>";
			echo "<td>".$barisJrnlPeg['hsl_jrnl_peg']."</td>";
			echo "<td>".$barisJrnlPeg['persentase_jrnl_peg']."%</td>";
			echo "<td>".$barisJrnlPeg['sts_jrnl_peg']."</td>";
			echo "<td>".$barisJrnlPeg['ket_jrnl_peg']."</td>";
			?>
			<td>
				<button type="button" class="btn btn-success" onclick="editJrnlPeg('<?php echo $barisJrnlPeg['id_jrnl_peg'] ?>','<?php echo $barisJrnlPeg['ringkasan_jrnl_peg'] ?>','<?php echo $barisJrnlPeg['hsl_jrnl_peg'] ?>','<?php echo $barisJrnlPeg['persentase_jrnl_peg'] ?>','<?php echo $barisJrnlPeg['sts_jrnl_peg'] ?>','<?php echo $barisJrnlPeg['ket_jrnl_peg'] ?>')" cl><span class="glyphicon glyphicon-edit"></span></button>
				<button type="button" class="btn btn-danger" onclick="vldsconJrnlPeg('<?php echo $barisJrnlPeg['id_jrnl_peg'] ?>')"><span class="glyphicon glyphicon-trash"></span></button>
			</td>
			<?php
			echo "</td>";
			echo "</tr>";
		}
						?>
					</tbody>
				</table>
				</br></br></br></br>
			</div>
			<div class="col-md-3">
				<form id="sidebar">
					<div class="form-group">
						<input type="hidden" name="id_usr_peg" id="id_usr_peg" value="<?php echo $id_usr_peg ?>">
						<label for="waktu">Waktu :</label>
						<input type="hidden" name="bulan" id="bulan" value="<?php $bln=date('m'); echo $bln; ?>">
						<input type="hidden" name="tahun" id="tahun" value="<?php $bln=date('Y'); echo $bln; ?>">
						<div class="tanggal"></div>
						<div class="jam"></div>
						<input type="hidden" name="id_jrnl_peg" id="id_jrnl_peg">
					</div>
					<div class="form-group">
						<label for="ringkasan_jrnl_peg">Ringkasan Jurnal :</label>
						<textarea class="form-control" name="ringkasan_jrnl_peg" id="ringkasan_jrnl_peg"></textarea>
					</div>
					<div class="form-group">
						<label for="hsl_jrnl_peg">Hasil Jurnal :</label>
						<textarea class="form-control" name="hsl_jrnl_peg" id="hsl_jrnl_peg"></textarea>
					</div>
					<div class="form-group">
						<label for="persentase_jrnl_peg">Persentase keberhasilan jurnal :</label>
						<div class="input-group">
							<input class="form-control" type="number" step="5" name="persentase_jrnl_peg" id="persentase_jrnl_peg"/>
							<span class="input-group-addon">%</span>
						</div>
					</div>
					<div class="form-group">
						<label for="sts_jrnl_peg">Status Jurnal :</label>
						<input class="form-control" type="text" name="sts_jrnl_peg" id="sts_jrnl_peg"/>
					</div>
					<div class="form-group">
						<label for="ket_jrnl_peg">Keterangan :</label>
						<select class="form-control" name="ket_jrnl_peg" id="ket_jrnl_peg">
							<option value="Tuntas" selected="">Tuntas</option>
							<option value="Belum Tuntas">Belum Tuntas</option>
						</select>
					</div>
					<button type="button" id="smpnjrnlpeg" class="btn btn-primary" onclick="smpnJrnlPeg()"><span class="glyphicon glyphicon-plus"></span> Tambahkan</button>
					<button type="button" id="perbaruijrnlpeg" class="btn btn-warning" onclick="perbaruiJrnlPeg()"><span class="glyphicon glyphicon-refresh"></span> Perbarui</button>
				</form>
			</div>
		</div>
	</div>

	<script src="script/script.js"></script>
	<script type="text/javascript">
		tmplJrnlPeg();
	</script>
</body>
</html>