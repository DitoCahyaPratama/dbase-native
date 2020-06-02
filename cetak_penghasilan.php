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
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-9 table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Gaji Pokok</th>
							<th>Total Tunjangan</th>
							<th>Total Potongan</th>
							<th>Take Home Pay</th>
							<th>Bulan</th>
							<th>Tahun</th>
						</tr>
					</thead>
					<?php
					$Bln = date('m');
					$Thn = date('Y');
					$Id_User = $_GET['Id_User'];
					$AmbilProfPeg = mysqli_fetch_Array(mysqli_query($dbcon,"SELECT * FROM tbl_ProfPeg WHERE Id_User='$Id_User'"));
					$NoPeg = $AmbilProfPeg['NoPeg']; 
					$amblGajiPeg1 = mysqli_query($dbcon,"SELECT * FROM tbl_GajiPeg WHERE NoPeg='$NoPeg' && Bln='$Bln' && Thn='$Thn' ");
					$ambilGajiPeg1 = mysqli_fetch_Array($amblGajiPeg1);
					$Bulan = $ambilGajiPeg1['Bln'];
					if($Bulan != $Bln){
						?>
						<tbody>
						<tr>
							<td colspan="7">Gaji anda bulan ini belum diisi</td>
						</tr>
						</tbody>
						<?php
					}else{
					?>
					<tbody>
						<?php
						$no = 0;
						$Bln = date('m');
						$Thn = date('Y');
						$Id_User = $_GET['Id_User'];
						$AmbilProfPeg = mysqli_fetch_Array(mysqli_query($dbcon,"SELECT * FROM tbl_ProfPeg WHERE Id_User='$Id_User'"));
						$NoPeg = $AmbilProfPeg['NoPeg']; 
						$amblGajiPeg = mysqli_query($dbcon,"SELECT * FROM tbl_GajiPeg WHERE NoPeg='$NoPeg' && Bln='$Bln' && Thn='$Thn' ");
						while($data = mysqli_fetch_array($amblGajiPeg)){
							$no++;
							$tmplBioPeg = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_BioPeg WHERE NoPeg='$NoPeg'"));
							$Jbtn = $tmplBioPeg['Jbtn'];
							$tmplGapok = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_jbtn WHERE IdJbtn = '$Jbtn'"));
							$Gapok = $tmplGapok['Gapok'];
							// ===========================================
							$nlTunjanganJbtn = $Gapok/100 * $data['TunjanganJbtn'];
							$nlTunjanganPerumahan = $Gapok/100 * $data['TunjanganPerumahan'];
							$nlTunjanganTransport = $Gapok/100 * $data['TunjanganTransport'];
							$nlTunjanganIstri = $Gapok/100 * $data['TunjanganIstri'];
							$nlTunjanganAnak = $Gapok/100 * $data['TunjanganAnak'];
							$nlTunjanganKebijakan = $data['TunjanganKebijakan'];
							$nlTHR = $Gapok/100 * $data['THR'];
							$Tunjangan = array($nlTunjanganJbtn, $nlTunjanganPerumahan, $nlTunjanganTransport, $nlTunjanganIstri, $nlTunjanganAnak, $nlTunjanganKebijakan);
							$jumTunjangan = array_sum($Tunjangan);
							// ===========================================
							$nlPotIuranJamsostek = $data['PotIuranJamsostek'];
							$nlPotIuranBPJS = $data['PotIuranBPJS'];
							$nlPotIuranKop = $data['PotIuranKop'];
							$nlDendaLambat = $data['DendaLambat'];
							$nlDendaKetidakhadiran = $data['DendaKetidakhadiran'];
							$nlPotMinCuti = $data['PotMinCuti'];
							$Potongan = array($nlPotIuranJamsostek, $nlPotIuranBPJS, $nlPotIuranKop, $nlDendaLambat, $nlDendaKetidakhadiran, $nlPotMinCuti);
							$jumPotongan = array_sum($Potongan);
							// ===========================================
							$TakeHomePay = $Gapok + $jumTunjangan - $jumPotongan;
							// ===========================================
							echo"<tr>";
							echo"<td>".$no."</td>";
							echo"<td>".rupiah($Gapok)."</td>";
							echo"<td>".rupiah($jumTunjangan)."</td>";
							echo"<td>".rupiah($jumPotongan)."</td>";
							echo"<td>".rupiah($TakeHomePay)."</td>";
							echo"<td>".$data['Bln']."</td>";
							echo"<td>".$data['Thn']."</td>";
							echo"</tr>";
						}
						?>
					</tbody>
				</table>
			</div>
			<div class="col-md-3">
				<?php
				$id = $_GET['Id_User'];
				?>
				<a href="cetak/cetak_Penghasilan_peg.php?Id_User=<?php echo $id; ?>"><button type="button" class="btn btn-primary">Cetak</button></a>
			</div>
			<?php
				}
			?>
		</div>
	</div>
	<script src="script/script.js"></script>
</body>
</html>