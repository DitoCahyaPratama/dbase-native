<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../assets\css\bootstrap.min.css">
	<link rel="icon" type="image/jpeg" href="../../images/Icon_DBase.jpg">
	<link rel="stylesheet" type="text/css" href="../../style/style.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.min.css">
	<link href="../../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../../assets/BootStrapDateTimePicker/CSS/Style.css">
  	<script src="../../script/jquery-3.2.1.min.js"></script>
  	<script src="../../assets\js\bootstrap.min.js"></script>
  	<script src="../../assets/js/jquery.dataTables.min.js"></script>
  	<script src="../../assets/js/dataTables.bootstrap.min.js"></script>
    <link href="../../assets/BootStrapDateTimePicker/DatePicker/bootstrap-datepicker.css" rel="stylesheet" />
	<script src="../../assets/BootStrapDateTimePicker/DatePicker/bootstrap-datepicker.js"></script>
</head>
<script>
    $(document).ready(function () {
        $(".datepicker").datepicker({ format: 'yyyy/mm/dd', autoclose: true, todayBtn: 'linked' })
        enabledisabletext();
        enadistunj();
        enabledisableAbs();
    });
</script>
<body style="background: #ffffff;">

	<?php
		include '../../config/koneksi.php';
		include '../../header.php';
		include '../../navigasi.php';
		include '../../footer.php';
		function rupiah($angka){
			$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
			return $hasil_rupiah;
		}
	?>
	<!-- <div id="page-content-wrapper"></div> -->

	<div class='container-fluid'>
		<div class="tab-content">
			<div id="AbsPeg" class="tab-pane fade in active">
				<div class="col-md-12">
					<h1 style="font-size: 25px; font-family: Lato-bold;">Data Absensi Pegawai</h1><br><hr><br>
				</div>
				<div class="row">
					<div class="col-md-3">
						<form name="AbsPeg">
						<div class="form-group">
							<label for="NoPeg4">NIP :</label>
							<?php
								echo"<select id='NoPeg4' name='NoPeg4' class='form-control'>";
											$tampil_NIP = mysqli_query($dbcon,"SELECT * FROM tbl_ProfPeg ORDER BY NoPeg");
								echo"<option value=''>-Pilih Nip-<option>";
								while($tmpl_NIP=mysqli_fetch_array($tampil_NIP)){
									echo"<option value = '$tmpl_NIP[NoPeg]'> ( $tmpl_NIP[NoPeg] ) $tmpl_NIP[NmPeg] </option>";
								}
								echo"</select>";
							?>
							<input type="hidden" id="NoPeg4Hid" name="NoPeg4Hid" />
						</div>
						<div class="form-group col-md-12">
							<div class="col-md-6">
								<label for="Bulan1">Bulan</label>
								<?php
									echo"<select id='Bulan1' name='Bulan1' class='form-control' required>";
									echo"<option value=''>-Bulan-<option>";
									for($bln=1;$bln<=12;$bln++){
										echo"<option value = '$bln'> $bln </option>";
									}
									echo"</select>";
								?>
							</div>
							<div class="col-md-6">
								<label for="Tahun1">Tahun</label>
								<?php
									echo"<select id='Tahun1' name='Tahun1' class='form-control' required>";
									echo"<option value=''>-Tahun-<option>";
									$tahunskrng = DATE('Y');
									for($tahun=2000;$tahun<=$tahunskrng;$tahun++){
										echo"<option value = '$tahun'> $tahun </option>";
									}
									echo"</select>";
								?>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="Hdr">Hadir :</label>
							<input type="number" name="Hdr" id="Hdr" class="form-control" placeholder="Hadir ..." />
						</div>
						<div class="form-group">
							<label for="Alf">Alfa :</label>
							<input type="number" name="Alf" id="Alf" class="form-control" placeholder="Alfa ..." />
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="Skt">Sakit :</label>
							<input type="number" name="Skt" id="Skt" class="form-control" placeholder="Sakit ..." />
						</div>
						<div class="form-group">
							<label for="Izn">Izin :</label>
							<input type="number" name="Izn" id="Izn" class="form-control" placeholder="Izin ..." />
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="Terlambat">Terlambat :</label>
							<input type="number" name="Terlambat" id="Terlambat" class="form-control" placeholder="Terlambat ..." />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" style="text-align:center;">
						<button type="button" id="smpnabspeg" class="btn btn-primary" onclick="smpnAbsPeg()" style="width: 120px; text-align: left;"><span class="glyphicon glyphicon-plus"></span> Tambahkan</button>
						<button type="button" id="perbaruiabspeg" class="btn btn-warning" onclick="perbaruiAbsPeg()" style="width: 120px; text-align: left;"><span class="glyphicon glyphicon-refresh"></span> Perbarui</button>
						<button type="reset" class="btn btn-success" style="width: 80px; text-align: left;" onclick="resetAbsPeg()"><span class="fa fa-close">  Batal</span></button></br></br><hr></br></br>
					</div>
					</form>
				</div>	
				<div class="row">
				<div class="col-md-12 table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>NIP</th>
								<th>Nama Pegawai</th>
								<th>Hadir</th>
								<th>Alfa</th>
								<th>Sakit</th>
								<th>Izin</th>
								<th>Terlambat</th>
								<th>Bulan</th>
								<th>Tahun</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$tmplAbsensi = mysqli_query($dbcon,"SELECT * FROM tbl_Abs ORDER BY NoPeg");
							while($data = mysqli_fetch_array($tmplAbsensi)){
								$DtNoPeg = $data['NoPeg'];
								$ambilProf = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_ProfPeg WHERE NoPeg='$DtNoPeg'"));
								echo"<tr>";
								echo"<td>".$DtNoPeg."</td>";
								echo"<td>".$ambilProf['NmPeg']."</td>";
								echo"<td>".$data['Hdr']." x</td>";
								echo"<td>".$data['Alf']." x</td>";
								echo"<td>".$data['Skt']." x</td>";
								echo"<td>".$data['Izn']." x</td>";
								echo"<td>".$data['Terlambat']." x</td>";
								echo"<td>".$data['Bln']."</td>";
								echo"<td>".$data['Thn']."</td>";
								?>
								<td>
								<button type="button" class="btn btn-success" onclick="editAbsPeg('<?php echo $data['NoPeg']; ?>', '<?php echo $data['Hdr']; ?>', '<?php echo $data['Alf']; ?>', '<?php echo $data['Skt']; ?>', '<?php echo $data['Izn']; ?>', '<?php echo $data['Terlambat']; ?>', '<?php echo $data['Bln']; ?>', '<?php echo $data['Thn']; ?>')" cl ><span class="glyphicon glyphicon-edit"></span></button>
								<button type="button" class="btn btn-danger" onclick="vldsconAbsPeg('<?php echo $data['IdAbs'] ?>', '<?php echo $data['NoPeg']; ?>', '<?php echo $data['Bln']; ?>', '<?php echo $data['Thn']; ?>')" cl ><span class="glyphicon glyphicon-trash"></span></button>
								</td>
								<?php
								echo"</tr>";
							}
							?>
						</tbody>
					</table>
					</br></br></br>
				</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<script language="javascript">

function enadistunj()
{
	document.Tunjangan.NoPeg3.disabled=false;
	document.Tunjangan.Bulan.disabled=false;
	document.Tunjangan.Tahun.disabled=false;
}

function enabledisableAbs()
{
	document.AbsPeg.NoPeg4.disabled=false;
	document.getElementById('Bulan1').disabled=false;
	document.getElementById('Tahun1').disabled=false;
}

function konversiUang(){
	var persen = document.getElementById('TunjanganJbtn').value;
	var gaji = document.getElementById('Gapok').value;
	var uang = persen/100 * gaji;
	document.getElementById('NilaiUang').value = uang;
}
</script>
	<script src="../../script/script.js"></script>
</body>
</html>
