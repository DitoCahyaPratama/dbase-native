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
			<div id="Tunjangan" class="tab-pane fade in active">
				<div class="col-md-12">
					<h1 style="font-size: 25px; font-family: Lato-bold;">Data Detail Gaji</h1><br><hr><br>
				</div>
					<div class="row">
						<div class="col-md-3">
							<form name="Tunjangan">
							<div class="form-group">
							<label for="NoPeg3">NIP :</label>
							<?php
								echo"<select id='NoPeg3' name='NoPeg3' class='form-control'>";
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
									<label for="Bulan">Bulan</label>
									<?php
										echo"<select id='Bulan' name='Bulan' class='form-control' required>";
										echo"<option value=''>-Bulan-<option>";
										for($bln=1;$bln<=12;$bln++){
											echo"<option value = '$bln'> $bln </option>";
										}
										echo"</select>";
									?>
								</div>
								<div class="col-md-6">
									<label for="Tahun">Tahun</label>
									<?php
										echo"<select id='Tahun' name='Tahun' class='form-control' required>";
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
						<div class="col-md-3" style="background: #f7f7f7;">
							<div class="form-group has-warning has-feedback">
								<label for="TunjanganJbtn1">Tunjangan Jabatan :</label>
								<div class="input-group">
									<input type="number" min="0" max="100" step="5" name="TunjanganJbtn1" id="TunjanganJbtn1" class="form-control" placeholder="Tidak Perlu Di isi !" readonly />
									<span class="input-group-addon">%</span>
								</div>
							</div>
							<div class="form-group">
								<label for="TunjanganPerumahan">Tunjangan Perumahan :</label>
								<div class="input-group">
									<input type="number" min="0" max="100" step="5" name="TunjanganPerumahan" id="TunjanganPerumahan" class="form-control" placeholder="Tunjangan Perumahan ..." />
									<span class="input-group-addon">%</span>
								</div>
							</div>
							<div class="form-group">
								<label for="TunjanganTransport">Tunjangan Transport :</label>
								<div class="input-group">
									<input type="number" min="0" max="100" step="5" name="TunjanganTransport" id="TunjanganTransport" class="form-control" placeholder="Tunjangan Transport ..." />
									<span class="input-group-addon">%</span>
								</div>
							</div>
						</div>
						<div class="col-md-3" style="background: #f7f7f7;">
							<div class="form-group">
								<label for="TunjanganIstri">Tunjangan Istri :</label>
								<div class="input-group">
									<input type="number" min="0" max="100" step="5" name="TunjanganIstri" id="TunjanganIstri" class="form-control" placeholder="Tunjangan Istri ..." />
									<span class="input-group-addon">%</span>
								</div>
							</div>
							<div class="form-group has-warning has-feedback">
								<label for="TunjanganAnak">Tunjangan Anak :</label>
								<div class="input-group">
									<input type="number" min="0" max="100" step="5" name="TunjanganAnak" id="TunjanganAnak" class="form-control" placeholder="Tidak Perlu Di isi !" readonly="" />
									<span class="input-group-addon">%</span>
								</div>
							</div>
							<div class="form-group">
								<label for="TunjanganKebijakan">Tunjangan Kebijakan :</label>
								<div class="input-group">
									<span class="input-group-addon">Rp</span>
									<input type="number" name="TunjanganKebijakan" id="TunjanganKebijakan" class="form-control" placeholder="Tunjangan Kebijakan ..." />
								</div>
							</div>
							<div class="form-group">
								<label for="THR">Tunjangan Hari Raya :</label>
								<div class="input-group">
									<input type="number" min="0" max="100" step="5" name="THR" id="THR" class="form-control" placeholder="Tunjangan Hari Raya ..." />
									<span class="input-group-addon">%</span>
								</div>
							</div>
							<div class="form-group">
								<label for="Cash">Cash :</label>
								<div class="input-group">
									<span class="input-group-addon">Rp</span>
									<input type="number" name="Cash" id="Cash" class="form-control" placeholder="Cash ..." />
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="PotIuranJamsostek">Potongan Jamsostek :</label>
								<div class="input-group">
									<span class="input-group-addon">Rp</span>
									<input type="number" name="PotIuranJamsostek" id="PotIuranJamsostek" class="form-control" placeholder="Potongan Jamsostek ..." />
								</div>
							</div>
							<div class="form-group">
								<label for="PotIuranBPJS">Potongan BPJS :</label>
								<div class="input-group">
									<span class="input-group-addon">Rp</span>
									<input type="number" name="PotIuranBPJS" id="PotIuranBPJS" class="form-control" placeholder="Potongan BPJS ..." />
								</div>
							</div>
							<div class="form-group">
								<label for="PotIuranKop">Potongan Koperasi + Pinjaman :</label>
								<div class="input-group">
									<span class="input-group-addon">Rp</span>
									<input type="number" name="PotIuranKop" id="PotIuranKop" class="form-control" placeholder="Potongan Koperasi ..." />
								</div>
							</div>
							<div class="form-group has-warning has-feedback">
								<label for="DendaLambat">Denda Lambat :</label>
								<div class="input-group">
									<span class="input-group-addon">Rp</span>
									<input type="number" name="DendaLambat" id="DendaLambat" class="form-control" placeholder="Tidak Perlu Di isi !" readonly="" />
								</div>
							</div>
							<div class="form-group">
								<label for="DendaKetidakhadiran">Denda Tak Hadir :</label>
								<div class="input-group has-warning has-feedback">
									<span class="input-group-addon">Rp</span>
									<input type="number" name="DendaKetidakhadiran" id="DendaKetidakhadiran" class="form-control" placeholder="Tidak Perlu Di isi !" readonly="" />
								</div>
							</div>
							<div class="form-group">
								<label for="PotMinCuti">Potongan Minus Cuti :</label>
								<div class="input-group">
									<span class="input-group-addon">Rp</span>
									<input type="number" name="PotMinCuti" id="PotMinCuti" class="form-control" placeholder="Potongan Minus Cuti ..." />
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" style="text-align:center;">
							<button type="button" id="smpngajipeg" class="btn btn-primary" onclick="smpnGajiPeg()" style="width: 120px; text-align: left;"><span class="glyphicon glyphicon-plus"></span> Tambahkan</button>
							<button type="button" id="perbaruigajipeg" class="btn btn-warning" onclick="perbaruiGajiPeg()" style="width: 120px; text-align: left;"><span class="glyphicon glyphicon-refresh"></span> Perbarui</button>
							<button type="reset" class="btn btn-success" style="width: 80px; text-align: left;" onclick="resetGajiPeg()"><span class="fa fa-close">  Batal</span></button></br></br><hr></br></br>
						</form>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 table-responsive">
							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th>NIP</th>
										<th>Nama Pegawai</th>
										<th>Tunj. Jabat</th>
										<th>Tunj. Rumah</th>
										<th>Tunj. Trans</th>
										<th>Tunj. Istri</th>
										<th>Tunj. Anak</th>
										<th>Tunj. Bijak</th>
										<th>THR</th>
										<th>Ptg. Jamsos tek</th>
										<th>Ptg. BPJS</th>
										<th>Ptg. Kope rasi</th>
										<th>Denda Lambat</th>
										<th>Denda Takhadir</th>
										<th>Ptg. Cuti</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$amblGaji = mysqli_query($dbcon,"SELECT tbl_GajiPeg.IdGaji, tbl_GajiPeg.NoPeg, tbl_GajiPeg.TunjanganJbtn, tbl_GajiPeg.TunjanganPerumahan, tbl_GajiPeg.TunjanganTransport, tbl_GajiPeg.TunjanganIstri, tbl_GajiPeg.TunjanganAnak, tbl_GajiPeg.TunjanganKebijakan, tbl_GajiPeg.THR, tbl_GajiPeg.PotIuranJamsostek, tbl_GajiPeg.PotIuranBPJS, tbl_GajiPeg.PotIuranKop, tbl_GajiPeg.DendaLambat, tbl_GajiPeg.DendaKetidakhadiran, tbl_GajiPeg.PotMinCuti, tbl_GajiPeg.Bln, tbl_GajiPeg.Thn, tbl_GajiPeg.Waktu, tbl_ProfPeg.NmPeg FROM tbl_GajiPeg INNER JOIN tbl_ProfPeg ON tbl_GajiPeg.NoPeg=tbl_ProfPeg.NoPeg");
										$tmplProfPeg = mysqli_query($dbcon,"SELECT * FROM tbl_ProfPeg");
										$data = mysqli_fetch_array($tmplProfPeg);
										$DtNoPeg = $data['NoPeg'];
										$nip = mysqli_query($dbcon,"SELECT * FROM tbl_BioPeg WHERE NoPeg = '$DtNoPeg'");
										$id__jtbn = mysqli_fetch_array($nip);
										$ambl_id_jbtn=$id__jtbn['Jbtn'];
										$TunjJbtn = mysqli_query($dbcon,"SELECT * FROM tbl_Jbtn WHERE IdJbtn='$ambl_id_jbtn'");
										$nilaiTunjJbtn = mysqli_fetch_array($TunjJbtn);
										while($dataGaji = mysqli_fetch_array($amblGaji)){

											echo"<tr>";
											echo"<td>".$dataGaji['NoPeg']."</td>";
											echo"<td>".$dataGaji['NmPeg']."</td>";
											echo"<td>".$dataGaji['TunjanganJbtn']."%</td>";
											echo"<td>".$dataGaji['TunjanganPerumahan']."%</td>";
											echo"<td>".$dataGaji['TunjanganTransport']."%</td>";
											echo"<td>".$dataGaji['TunjanganIstri']."%</td>";
											echo"<td>".$dataGaji['TunjanganAnak']."%</td>";
											echo"<td>".rupiah($dataGaji['TunjanganKebijakan'])."</td>";
											echo"<td>".$dataGaji['THR']."%</td>";
											echo"<td>".rupiah($dataGaji['PotIuranJamsostek'])."</td>";
											echo"<td>".rupiah($dataGaji['PotIuranBPJS'])."</td>";
											echo"<td>".rupiah($dataGaji['PotIuranKop'])."</td>";
											echo"<td>".rupiah($dataGaji['DendaLambat'])."</td>";
											echo"<td>".rupiah($dataGaji['DendaKetidakhadiran'])."</td>";
											echo"<td>".rupiah($dataGaji['PotMinCuti'])."</td>";
											?>
											<td>
											<button type="button" class="btn btn-success" onclick="editGajiPeg('<?php echo $data['NoPeg'] ?>','<?php echo $dataGaji['Bln'] ?>','<?php echo $dataGaji['Thn'] ?>','<?php echo $nilaiTunjJbtn['TunjanganJbtn'] ?>','<?php echo $dataGaji['TunjanganPerumahan'] ?>','<?php echo $dataGaji['TunjanganTransport'] ?>','<?php echo $dataGaji['TunjanganIstri'] ?>','<?php echo $dataGaji['TunjanganAnak'] ?>','<?php echo $dataGaji['TunjanganKebijakan'] ?>','<?php echo $dataGaji['THR'] ?>','<?php echo $dataGaji['PotIuranJamsostek'] ?>','<?php echo $dataGaji['PotIuranBPJS'] ?>','<?php echo $dataGaji['PotIuranKop'] ?>','<?php echo $dataGaji['DendaLambat'] ?>','<?php echo $dataGaji['DendaKetidakhadiran'] ?>','<?php echo $dataGaji['PotMinCuti'] ?>')" cl ><span class="glyphicon glyphicon-edit"></span></button>
											<button type="button" class="btn btn-danger" onclick="vldsconGajiPeg('<?php echo $dataGaji['IdGaji']; ?>')"><span class="glyphicon glyphicon-trash"></span></button>
											</td>
											<?php
											echo"</tr>";
										}
									?>
								</tbody>
							</table>
							</br></br></br></br>
						</div>
					</div>
			</div>
			<div id="FilGaj" class="tab-pane fade">
				<div class="col-md-12">
					<h1 style="font-size: 25px; font-family: Lato-bold;">Data Filter Gaji</h1><br><hr><br>
				</div>
				<div class="row">
					<!--<div class="col-md-12">
						<form name="FilterGaji" action="Print/cetak_Gaji.php" method="post">
							<div class="form-group">
								<label for="bln2">Bulan</label>
								<?php
									echo"<select id='bln2' name='bln2' class='form-control' required>";
									echo"<option value=''>-Pilih Bulan-<option>";
									for($bln=1;$bln<=12;$bln++){
										echo"<option value = '$bln'> $bln </option>";
									}
									echo"</select>";
								?>
							</div>
							<div class="form-group">
								<label for="thn2">Tahun</label>
								<?php
									echo"<select id='thn2' name='thn2' class='form-control' required>";
									echo"<option value=''>-Pilih Tahun-<option>";
									$tahunskrng = DATE('Y');
									for($tahun=2000;$tahun<=$tahunskrng;$tahun++){
										echo"<option value = '$tahun'> $tahun </option>";
									}
									echo"</select>";
								?>
							</div>
							<div class="form-group">
									<button type="submit" class="btn btn-primary"><span class="fa fa-print"></span>  Cetak</input>
							</div>
						</form>
					</div>-->
				</div>
				<div class="row">
					<div class="col-md-12 table-responsive">
						<table class="table table-hover table-striped table-bordered">
							<thead>
								<tr>
									<th>NIP</th>
									<th>Nama Pegawai</th>
									<th>Gaji Pokok</th>
									<th>Total Tunjangan</th>
									<th>Total Potongan</th>
									<th>Take Home Pay</th>
									<th>Bulan</th>
									<th>Tahun</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$tmplProfPeg = mysqli_query($dbcon,"SELECT * FROM tbl_ProfPeg ORDER BY NoPeg");
									while($data = mysqli_fetch_array($tmplProfPeg)){
										$DtNoPeg = $data['NoPeg'];
										$tmplBioPeg = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_BioPeg WHERE NoPeg='$DtNoPeg'"));
										$Jbtn = $tmplBioPeg['Jbtn'];
										$tmplGapok = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_jbtn WHERE IdJbtn = '$Jbtn'"));
										$Gapok = $tmplGapok['Gapok'];
										$ambilgaji = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_GajiPeg Where NoPeg='$DtNoPeg'"));
										// ===========================================
										$nlTunjanganJbtn = $Gapok/100 * $ambilgaji['TunjanganJbtn'];
										$nlTunjanganPerumahan = $Gapok/100 * $ambilgaji['TunjanganPerumahan'];
										$nlTunjanganTransport = $Gapok/100 * $ambilgaji['TunjanganTransport'];
										$nlTunjanganIstri = $Gapok/100 * $ambilgaji['TunjanganIstri'];
										$nlTunjanganAnak = $Gapok/100 * $ambilgaji['TunjanganAnak'];
										$nlTunjanganKebijakan = $ambilgaji['TunjanganKebijakan'];
										$nlTHR = $Gapok/100 * $ambilgaji['THR'];
										$Tunjangan = array($nlTunjanganJbtn, $nlTunjanganPerumahan, $nlTunjanganTransport, $nlTunjanganIstri, $nlTunjanganAnak, $nlTunjanganKebijakan);
										$jumTunjangan = array_sum($Tunjangan);
										// ===========================================
										$nlPotIuranJamsostek = $ambilgaji['PotIuranJamsostek'];
										$nlPotIuranBPJS = $ambilgaji['PotIuranBPJS'];
										$nlPotIuranKop = $ambilgaji['PotIuranKop'];
										$nlDendaLambat = $ambilgaji['DendaLambat'];
										$nlDendaKetidakhadiran = $ambilgaji['DendaKetidakhadiran'];
										$nlPotMinCuti = $ambilgaji['PotMinCuti'];
										$Potongan = array($nlPotIuranJamsostek, $nlPotIuranBPJS, $nlPotIuranKop, $nlDendaLambat, $nlDendaKetidakhadiran, $nlPotMinCuti);
										$jumPotongan = array_sum($Potongan);
										// ===========================================
										$TakeHomePay = $Gapok + $jumTunjangan - $jumPotongan;
										// ===========================================
										echo"<tr>";
										echo"<td>".$DtNoPeg."</td>";
										echo"<td>".$data['NmPeg']."</td>";
										echo"<td>".rupiah($Gapok)."</td>";
										echo"<td>".rupiah($jumTunjangan)."</td>";
										echo"<td>".rupiah($jumPotongan)."</td>";
										echo"<td>".rupiah($TakeHomePay)."</td>";
										echo"<td>".$ambilgaji['Bln']."</td>";
										echo"<td>".$ambilgaji['Thn']."</td>";
										echo"</tr>";
									}
								?>
							</tbody>
						</table>
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
