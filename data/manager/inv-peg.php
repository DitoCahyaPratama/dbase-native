<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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
    });
</script>
<body style="background: #ffffff;">

	<?php
		include '../../config/koneksi.php';
		include '../../navigasi.php';
		include '../../header.php';
		include '../../footer.php';
	?>
	<div id="page-content-wrapper"></div>
		<div class="container-fluid">
				<div class="tab-content">
					<div id="DtUser" class="tab-pane fade in active">
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
										<option value="2" selected="">Pegawai</option>
										<option value="3">Manager</option>
									</select>
								</div>
								<button type="button" id="smpnuser" class="btn btn-primary" onclick="smpnUserM()" style="width: 120px; text-align: left;"><span class="glyphicon glyphicon-plus"></span> Tambahkan</button>
								<button type="button" id="perbaruiuser" class="btn btn-warning" onclick="perbaruiUserM()" style="width: 120px; text-align: left;"><span class="glyphicon glyphicon-refresh"></span> Perbarui</button>
								<button type="reset" class="btn btn-success" style="width: 80px; text-align: left;" onclick="resetUserM()"><span class="fa fa-close">  Batal</span>
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
									$tmplUser = mysqli_query($dbcon,"SELECT * FROM tbl_User WHERE Id_User != 1 ORDER BY Id_User");
									while($data = mysqli_fetch_array($tmplUser)){
										echo"<tr>";
										echo"<td>".$data['Id_User']."</td>";
										echo"<td>".$data['Uname']."</td>";
										?>
										<td>
										<button type="button" class="btn btn-success" onclick="editUserM('<?php echo $data['Id_User'] ?>','<?php echo $data['Uname'] ?>')" cl ><span class="glyphicon glyphicon-edit"></span></button>
										<button type="button" class="btn btn-danger" onclick="vldsconUserM('<?php echo $data['Id_User'] ?>')"><span class="glyphicon glyphicon-trash"></span></button>
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

</script>
	<script src="../../script/script.js"></script>
</body>
</html>
