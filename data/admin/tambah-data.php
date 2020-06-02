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
			<div id="DtAgm" class="tab-pane fade in active">
				<div class="col-md-12">
					<h1 style="font-size: 25px; font-family: Lato-bold;">Data Agama</h1><br><hr><br>
				</div>
				<div class="row">
				<div class="col-md-6" style="text-align:left;" >
					<form>
						<div class="form-group">
							<label for="IdAgm" >ID Agama :</label>
							<input type="text" name="IdAgm" id="IdAgm" class="form-control" placeholder="ID Agama ..." readonly />
						</div>
						<div class="form-group">
							<label for="NmAgm">Nama Agama :</label>
							<input type="text" name="NmAgm" id="NmAgm" class="form-control" placeholder="Nama Agama ..." />
						</div>
						<button type="button" id="smpnagm" class="btn btn-primary" onclick="smpnAgm()" style="width: 120px; text-align: left;"><span class="glyphicon glyphicon-plus"></span> Tambahkan</button>
						<button type="button" id="perbaruiagm" class="btn btn-warning" onclick="perbaruiAgm()" style="width: 120px; text-align: left;"><span class="glyphicon glyphicon-refresh"></span> Perbarui</button>
						<button type="reset" class="btn btn-success" style="width: 80px; text-align: left;" onclick="resetAgm()"><span class="fa fa-close">  Batal</span></button></br></br><hr></br></br>
					</form>
				</div>
				<div class="col-md-6 table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nama Agama</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$tmplAgm = mysqli_query($dbcon,"SELECT * FROM tbl_Agm ORDER BY IdAgm");
							while($data = mysqli_fetch_array($tmplAgm)){
								echo"<tr>";
								echo"<td>".$data['IdAgm']."</td>";
								echo"<td>".$data['NmAgm']."</td>";
								?>
								<td>
								<button type="button" class="btn btn-success" onclick="editAgm('<?php echo $data['IdAgm'] ?>','<?php echo $data['NmAgm'] ?>')" cl ><span class="glyphicon glyphicon-edit"></span></button>
								<button type="button" class="btn btn-danger" onclick="vldsconAgm('<?php echo $data['IdAgm'] ?>')"><span class="glyphicon glyphicon-trash"></span></button>
								</td>
								<?php
								echo "</tr>";
							}
							?>
						</tbody>
					</table>
					</br></br></br></br>
				</div>
				</div>
			</div>
			<div id="DtJbtn" class="tab-pane fade">
				<div class="col-md-12">
					<h1 style="font-size: 25px; font-family: Lato-bold;">Data Jabatan</h1><br><hr><br>
				</div>
				<div class="col-md-6" style="text-align:left;" >
					<form>
						<div class="form-group">
							<label for="IdJbtn" >ID Jabatan :</label>
							<input type="text" name="IdJbtn" id="IdJbtn" class="form-control" placeholder="ID Jabatan ..." readonly />
						</div>
						<div class="form-group">
							<label for="NmJbtn">Nama Jabatan :</label>
							<input type="text" name="NmJbtn" id="NmJbtn" class="form-control" placeholder="Nama Jabatan ..." />
						</div>
						<div class="form-group">
							<label for="Gapok">Gaji Pokok :</label>
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="text" name="Gapok" id="Gapok" class="form-control" placeholder="Gaji Pokok ..." />
							</div>
						</div>
						<div class="form-group">
							<label for="Level">Level :</label>
							<select class="form-control" id="Level" name="Level">
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
							</select>
						</div>
						<div class="form-group">
							<label for="TunjanganJbtn">Tunjangan Jabatan :</label>
							<div class="input-group">
								<input type="number" name="TunjanganJbtn" min="0" max="100" step="5" id="TunjanganJbtn" class="form-control" placeholder="Tunjangan Jabatan ..." onkeyup="konversiUang();" onchange="konversiUang();" onclick="konversiUang();" />
								<span class="input-group-addon">%</span>
							</div>
						</div>
						<div class="form-group">
							<label for="NilaiUang">Besar Tunjangan</label>
							<div class="input-group">
								<span class="input-group-addon">Rp</span>
								<input type="number" name="NilaiUang" id="NilaiUang" min="0" class="form-control" placeholder="Besar Tunjangan ... " readonly />
							</div>
						</div>
						<button type="button" id="smpnjbtn" class="btn btn-primary" onclick="smpnJbtn()" style="width: 120px; text-align: left;"><span class="glyphicon glyphicon-plus"></span> Tambahkan</button>
						<button type="button" id="perbaruijbtn" class="btn btn-warning" onclick="perbaruiJbtn()" style="width: 120px; text-align: left;"><span class="glyphicon glyphicon-refresh"></span> Perbarui</button>
						<button type="reset" class="btn btn-success" style="width: 80px; text-align: left;" onclick="resetJbtn()"><span class="fa fa-close">  Batal</span></button></br></br><hr></br></br>
					</form>
				</div>
				<div class="col-md-6 table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nama Jbtn</th>
								<th>Level</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$tmplJbtn = mysqli_query($dbcon,"SELECT * FROM tbl_Jbtn ORDER BY IdJbtn");
							while($data = mysqli_fetch_array($tmplJbtn)){
								echo"<tr>";
								echo"<td>".$data['IdJbtn']."</td>";
								echo"<td>".$data['NmJbtn']."</td>";
								echo"<td>".$data['Level']."</td>";
								?>
								<td>
								<button type="button" class="btn btn-success" onclick="editJbtn('<?php echo $data['IdJbtn']; ?>','<?php echo $data['NmJbtn']; ?>','<?php echo $data['Gapok']; ?>','<?php echo $data['Level']; ?>','<?php echo $data['TunjanganJbtn']; ?>') " cl ><span class="glyphicon glyphicon-edit"></span></button>
								<button type="button" class="btn btn-danger" onclick="vldsconJbtn('<?php echo $data['IdJbtn'] ?>')"><span class="glyphicon glyphicon-trash"></span></button>
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
			<div id="DtUser" class="tab-pane fade">
				<div class="col-md-12">
					<h1 style="font-size: 25px; font-family: Lato-bold;">Data User</h1><br><hr><br>
				</div>
				<div class="col-md-6" style="text-align:left;" >
					<form>
						<div class="form-group">
							<label for="Id_User" >ID User :</label>
							<input type="text" name="Id_User" id="Id_User" class="form-control" placeholder="ID User ..." readonly />
						</div>
						<div class="form-group">
							<label for="Uname">Username :</label>
							<input type="text" name="Uname" id="Uname" class="form-control" placeholder="Username ..." />
						</div>
						<div class="form-group">
							<label for="Pass">Password :</label>
							<input type="text" name="Pass" id="Pass" class="form-control" placeholder="Password ..." />
						</div>
						<div class="form-group">
							<label for="Lvl">Level :</label>
							<select class="form-control" name="Lvl" id="Lvl">
								<option value="1" selected="">Admin</option>
								<option value="2">Pegawai</option>
								<option value="3">Manager</option>
							</select>
						</div>
						<button type="button" id="smpnuser" class="btn btn-primary" onclick="smpnUser()" style="width: 120px; text-align: left;"><span class="glyphicon glyphicon-plus"></span> Tambahkan</button>
						<button type="button" id="perbaruiuser" class="btn btn-warning" onclick="perbaruiUser()" style="width: 120px; text-align: left;"><span class="glyphicon glyphicon-refresh"></span> Perbarui</button>
						<button type="reset" class="btn btn-success" style="width: 80px; text-align: left;" onclick="resetUser()"><span class="fa fa-close">  Batal</span></button></br></br><hr></br></br>
					</form>
				</div>
				<div class="col-md-6 table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Username</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$tmplUser = mysqli_query($dbcon,"SELECT * FROM tbl_User ORDER BY Id_User");
							while($data = mysqli_fetch_array($tmplUser)){
								echo"<tr>";
								echo"<td>".$data['Id_User']."</td>";
								echo"<td>".$data['Uname']."</td>";
								?>
								<td>
								<button type="button" class="btn btn-success" onclick="editUser('<?php echo $data['Id_User'] ?>','<?php echo $data['Uname'] ?>')" cl ><span class="glyphicon glyphicon-edit"></span></button>
								<button type="button" class="btn btn-danger" onclick="vldsconUser('<?php echo $data['Id_User'] ?>')"><span class="glyphicon glyphicon-trash"></span></button>
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
			<div id="ProfPeg" class="tab-pane fade">
				<div class="col-md-12">
					<h1 style="font-size: 25px; font-family: Lato-bold;">Data Profil Pegawai</h1><br><hr><br>
				</div>
				<div class="col-md-12" style="text-align:left;" >
					<form>
						<div class="form-group">
							<label for="NoPeg" >No Pegawai :</label>
							<input type="number" name="NoPeg" id="NoPeg" maxlength="9" class="form-control" placeholder="No Pegawai ..."/>
						</div>
						<div class="form-group">
							<label for="NmPeg">Nama Pegawai :</label>
							<input type="text" name="NmPeg" id="NmPeg" class="form-control" placeholder="Nama Pegawai ..." />
						</div>
						<div class="form-group">
							<label for="TglGabung">Tanggal Gabung :</label>
							<input type="text" name="TglGabung" id="TglGabung" class="form-control datepicker" placeholder="Tanggal Gabung ..." readonly />
						</div>
						<div class="form-group">
							<label for="Id_User1">ID User :</label>
							<?php
								echo"<select id='Id_User1' name='Id_User1' class='form-control'>";
											$tampil_IdUser = mysqli_query($dbcon,"SELECT * FROM tbl_User ORDER BY Id_User");
								echo"<option value=''>-Pilih Id User-<option>";
								while($tmpl_Id_User=mysqli_fetch_array($tampil_IdUser)){
									echo"<option value = '$tmpl_Id_User[Id_User]'> ( $tmpl_Id_User[Id_User] ) $tmpl_Id_User[Uname] </option>";
								}
								echo"</select>";
							?>
						</div>
						<button type="button" id="smpnprofpeg" class="btn btn-primary" onclick="smpnProfPeg()" style="width: 120px; text-align: left;"><span class="glyphicon glyphicon-plus"></span> Tambahkan</button>
						<button type="button" id="perbaruiprofpeg" class="btn btn-warning" onclick="perbaruiProfPeg()" style="width: 120px; text-align: left;"><span class="glyphicon glyphicon-refresh"></span> Perbarui</button>
						<button type="reset" class="btn btn-success" style="width: 80px; text-align: left;" onclick="resetProfPeg()"><span class="fa fa-close">  Batal</span></button></br></br><hr></br></br>
					</form>
				</div>
				<div class="col-md-12 table-responsive">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>NIP</th>
								<th>Nama Pegawai</th>
								<th>Tanggal Gabung</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$tmplProfPeg = mysqli_query($dbcon,"SELECT * FROM tbl_ProfPeg ORDER BY NoPeg");
							while($data = mysqli_fetch_array($tmplProfPeg)){
								echo"<tr>";
								echo"<td>".$data['NoPeg']."</td>";
								echo"<td>".$data['NmPeg']."</td>";
								echo"<td>".$data['TglGabung']."</td>";
								?>
								<td>
								<button type="button" class="btn btn-success" onclick="editProfPeg('<?php echo $data['NoPeg'] ?>','<?php echo $data['NmPeg'] ?>','<?php echo $data['TglGabung'] ?>','<?php echo $data['Id_User'] ?>')" cl ><span class="glyphicon glyphicon-edit"></span></button>
								<button type="button" class="btn btn-danger" onclick="vldsconProfPeg('<?php echo $data['NoPeg'] ?>')"><span class="glyphicon glyphicon-trash"></span></button>
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
			<div id="BioPeg" class="tab-pane fade">
				<div class="col-md-12">
					<h1 style="font-size: 25px; font-family: Lato-bold;">Data Biografi Pegawai</h1><br><hr><br>
				</div>
				<div class="row">
					<div class="col-md-3">
						<form name="BioPeg">
						<div class="form-group">
							<label for="NoPeg2">No Pegawai :</label>
							<input type="text" name="NoPeg2" id="NoPeg2" class="form-control" placeholder="No. Pegawai ..." readonly />
						</div>
						<div class="form-group">
							<label for="TmptLhr">Tempat Lahir :</label>
							<input type="text" name="TmptLhr" id="TmptLhr" class="form-control" placeholder="Tempat Lahir ..." />
						</div>
						<div class="form-group">
							<label for="TglLhr">Tanggal Lahir :</label>
							<input type="text" name="TglLhr" id="TglLhr" class="form-control datepicker" placeholder="Tanggal Lahir ..." readonly />
						</div>
						<div class="form-group">
							<label for="Gndr">Gender :</label>
							<select class="form-control" name="Gndr" id="Gndr">
								<option value="" selected>-- Pilih Gender --</option>
								<option value="Laki-laki"="">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="Almt">Alamat :</label>
							<input type="text" name="Almt" id="Almt" class="form-control" placeholder="Alamat ..." />
						</div>
						<div class="form-group">
							<label for="NoTelp">No.Telp :</label>
							<input type="number" name="NoTelp" id="NoTelp" class="form-control" placeholder="No. Telp ..." maxlength="20"/>
						</div>
						<div class="form-group">
							<label for="Agm">Agama :</label>
							<?php
								echo"<select id='Agm' name='Agm' class='form-control'>";
											$tampil_Agama = mysqli_query($dbcon,"SELECT * FROM tbl_Agm ORDER BY IdAgm");
								echo"<option value=''>-Pilih Agama-<option>";
								while($tmpl_Agama=mysqli_fetch_array($tampil_Agama)){
									echo"<option value = '$tmpl_Agama[NmAgm]'>$tmpl_Agama[NmAgm]</option>";
								}
								echo"</select>";
							?>
						</div>
						<div class="form-group">
							<label for="StsNkh">Status Nikah :</label>
							<select class="form-control" name="StsNkh" id="StsNkh">
								<option value="" selected="">-- Pilih Status Nikah --</option>
								<option value="Single">Single</option>
								<option value="Nikah">Nikah</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="col-md-12">
							<div class="col-md-6 form-group">
								<label for="JmlhAnak">Jumlah anak :</label>
								<input type="number" min="0" name="JmlhAnak" Id="JmlhAnak" class="form-control" placeholder="Jumlah ..." />
							</div>
							<div class="col-md-6 form-group">
								<label for="AnakNikah">Menikah :</label>
								<input type="number" min="0" name="AnakNikah" id="AnakNikah" class="form-control" placeholder="Anak yang menikah ..." />
							</div>
						</div>
						<div class="form-group">
							<label for="Kewarganegaraan">Kewarganegaraan :</label>
							<?php
								echo"<select id='Kewarganegaraan' name='Kewarganegaraan' class='form-control'>";
											$tampil_Negara = mysqli_query($dbcon,"SELECT * FROM apps_countries ORDER BY IdKewarganegaraan");
								echo"<option value=''>-Pilih Negara-<option>";
								while($tmpl_Negara=mysqli_fetch_array($tampil_Negara)){
									echo"<option value = '$tmpl_Negara[NmKewarganegaraan]'>$tmpl_Negara[NmKewarganegaraan]</option>";
								}
								echo"</select>";
							?>
						</div>
						<div class="form-group">
							<label for="Jbtn">Jabatan :</label>
							<?php
								echo"<select id='Jbtn' name='Jbtn' class='form-control'>";
											$tampil_Jbtn = mysqli_query($dbcon,"SELECT * FROM tbl_Jbtn ORDER BY IdJbtn");
								echo"<option value=''>-Pilih Jabatan-<option>";
								while($tmpl_Jbtn=mysqli_fetch_array($tampil_Jbtn)){
									echo"<option value = '$tmpl_Jbtn[IdJbtn]'>$tmpl_Jbtn[NmJbtn] $tmpl_Jbtn[Level]</option>";
								}
								echo"</select>";
							?>
						</div>
						<div class="form-group">
							<label for="PndAkr">Pendidikan Akhir :</label>
							<input type="text" name="PndAkr" id="PndAkr" class="form-control" placeholder="Pendidikan Akhir ..." />
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="Email">Email :</label>
							<input type="email" name="Email" id="Email" class="form-control" placeholder="Email ..." />
						</div>
						<div class="form-group">
							<label for="GolDar">Gol Darah :</label>
							<select class="form-control" name="GolDar" id="GolDar">
								<option value='' selected="">-- Pilih Gol Darah --</option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="AB">AB</option>
								<option value="O">O</option>
							</select>
						</div>
						<div class="form-group">
							<label for="ContDar">Kontak Darurat :</label>
							<input type="number" name="ContDar" id="ContDar" class="form-control" placeholder="Kontak Darurat ..." maxlength="20" />
						</div>
						<div class="col-md-12">
							<div class=" col-md-6 form-group">
								<label for="NoKTP">No KTP :</label>
								<input type="number" name="NoKTP" id="NoKTP" class="form-control" placeholder="Nomor KTP ..." maxlength="16"/>
							</div>
							<div class=" col-md-6 form-group">
								<label for="NoKK">No KK :</label>
								<input type="number" name="NoKK" id="NoKK" class="form-control" placeholder="Nomor KK ..." maxlength="16"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12" style="text-align:center;">
						<button type="button" id="perbaruibiopeg" class="btn btn-primary" onclick="perbaruiBioPeg()" style="width: 120px; text-align: left;"><span class="fa fa-save"></span> Simpan</button>
						<button type="reset" class="btn btn-success" style="width: 80px; text-align: left;" onclick="resetBioPeg()"><span class="fa fa-close">  </span>Batal</button></br></br><hr></br></br>
						</div>
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
								<th>Alamat</th>
								<th>Kewarganegaraan</th>
								<th>Gol Darah</th>
								<th>Jabatan</th>
								<th>Agama</th>
								<th>Pend.Akhir</th>
								<th>Status</th>
								<th>Jmlh Anak</th>
								<th>JK</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$tmplProfPeg = mysqli_query($dbcon,"SELECT * FROM tbl_ProfPeg ORDER BY NoPeg");
							while($data = mysqli_fetch_array($tmplProfPeg)){
								$DtNoPeg = $data['NoPeg'];
								$tmplBioPeg = mysqli_query($dbcon,"SELECT * FROM tbl_BioPeg WHERE NoPeg='$DtNoPeg'");
								$dataBio = mysqli_fetch_array($tmplBioPeg);
								$IdJbtn = $dataBio['Jbtn'];
								$tmpljbtn = mysqli_query($dbcon,"SELECT NmJbtn FROM tbl_jbtn WHERE IdJbtn = '$IdJbtn'");
								$dataJbtn = mysqli_fetch_array($tmpljbtn);
								echo"<tr>";
								echo"<td>".$DtNoPeg."</td>";
								echo"<td>".$data['NmPeg']."</td>";
								echo"<td>".$dataBio['Almt']."</td>";
								echo"<td>".$dataBio['Kewarganegaraan']."</td>";
								echo"<td>".$dataBio['GolDar']."</td>";
								echo"<td>".$dataJbtn['NmJbtn']."</td>";
								echo"<td>".$dataBio['Agm']."</td>";
								echo"<td>".$dataBio['PndAkr']."</td>";
								echo"<td>".$dataBio['StsNkh']."</td>";
								echo"<td>".$dataBio['JmlhAnak']."</td>";
								echo"<td>".$dataBio['Gndr']."</td>";
								?>
								<td>
								<button type="button" class="btn btn-success" onclick="editBioPeg('<?php echo $dataGaji['NoPeg']; ?>', '<?php echo $dataBio['TmptLhr']; ?>', '<?php echo $dataBio['TglLhr']; ?>', '<?php echo $dataBio['Gndr']; ?>', '<?php echo $dataBio['Almt']; ?>', '<?php echo $dataBio['NoTelp']; ?>', '<?php echo $dataBio['Agm']; ?>', '<?php echo $dataBio['StsNkh']; ?>', '<?php echo $dataBio['JmlhAnak']; ?>', '<?php echo $dataBio['AnakNikah']; ?>', '<?php echo $dataBio['Kewarganegaraan']; ?>', '<?php echo $dataBio['Jbtn']; ?>', '<?php echo $dataBio['PndAkr']; ?>', '<?php echo $dataBio['Email']; ?>', '<?php echo $dataBio['GolDar']; ?>', '<?php echo $dataBio['ContDar']; ?>', '<?php echo $dataBio['NoKTP']; ?>')" cl ><span class="glyphicon glyphicon-edit"></span></button>
								<button type="button" class="btn btn-danger" onclick="vldsconBioPeg('<?php echo $data['NoPeg'] ?>')"><span class="glyphicon glyphicon-trash"></span></button>
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
			<div id="AbsPeg" class="tab-pane fade">
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
						<div class="form-group">
							<label for="OverTime">Overtime :</label>
							<div class="input-group">
								<input type="number" min="0" name="OverTime" id="OverTime" class="form-control" placeholder="Overtime ..." />
								<span class="input-group-addon">Jam</span>
							</div>
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
					</br></br></br></br>
				</div>
				</div>
			</div>
			<div id="Tunjangan" class="tab-pane fade">
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
						</br></br></br></br>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<script language="javascript">
function enabledisabletext()
{
	document.BioPeg.NoPeg2.disabled=true;
	document.BioPeg.TmptLhr.disabled=true;
	document.BioPeg.TglLhr.disabled=true;
	document.BioPeg.Gndr.disabled=true;
	document.BioPeg.Almt.disabled=true;
	document.BioPeg.NoTelp.disabled=true;
	document.BioPeg.Agm.disabled=true;
	document.BioPeg.StsNkh.disabled=true;
	document.BioPeg.JmlhAnak.disabled=true;
	document.BioPeg.AnakNikah.disabled=true;
	document.BioPeg.Kewarganegaraan.disabled=true;
	document.BioPeg.Jbtn.disabled=true;
	document.BioPeg.PndAkr.disabled=true;
	document.BioPeg.Email.disabled=true;
	document.BioPeg.GolDar.disabled=true;
	document.BioPeg.ContDar.disabled=true;
	document.BioPeg.NoKTP.disabled=true;
	document.BioPeg.NoKK.disabled=true;
}

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
