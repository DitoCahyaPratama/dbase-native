<?php
	include 'koneksi.php';
	$page = isset($_GET['p'])? $_GET['p'] : '';
	function rupiah($angka){
		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;
	}
	//==========================================================================================================================
	// ini untuk cek login
	//==========================================================================================================================
	if($page == 'login'){
		$username = $_POST['Username'];
		$password = $_POST['Password'];
		$login = mysqli_query($dbcon,"SELECT * FROM tbl_user WHERE Uname='$username' AND Pass='$password'");
		$online = mysqli_query($dbcon,"SELECT * FROM online");
		$Uonline = mysqli_fetch_array($online);
		$sts = $Uonline['nick'];
		$terlogin = mysqli_fetch_array($login);
		$uname = $terlogin['Uname'];
		$pwd = $terlogin['Pass'];

		if(empty($username)){
			echo"<script>alert('Username belum diisi')</script>";
			echo"<meta http-equiv='refresh' content='1 url=index.php'>";
		}else if(empty($password)){
			echo"<script>alert('Password belum diisi')</script>";
			echo"<meta http-equiv='refresh' content='1 url=index.php'>";
		}else if ($username == $uname  && $password == $pwd){
			if($username != $sts){
				session_start();

				if (mysqli_num_rows($login) > 0){
					$_SESSION['username'] = $username;
					$user = mysqli_query($dbcon,"SELECT * FROM tbl_User WHERE Uname='$username'");
					$d = mysqli_fetch_array($user);
					$id = $d['Id_User'];
					$lv = $d['Lvl'];
					$waktu=date("h:m:s");
					$online = mysqli_query($dbcon,"INSERT INTO online (nick,waktu) VALUES('$uname','$waktu')");
					header('location:../index.php?Id_User='.$id.'&Uname='.$username.'&click=o');
				}else{
					echo "<script>alert('Username atau Password salah')</script>";
					echo "<meta http-equiv='refresh' content='1 url=../login.php'>";
				}
			}else{
				echo "<script>alert('Akun sedang ONLINE')</script>";
				echo "<meta http-equiv='refresh' content='1 url=../login.php'>";
			}
		}else{
			echo "<script>alert('Username atau Password salah')</script>";
			echo "<meta http-equiv='refresh' content='1 url=../login.php'>";
		}
	}

	//==========================================================================================================================
	// ini untuk cek logout
	//==========================================================================================================================

	else if($page == 'logout'){
		$Uname = $_GET['Uname'];
		$hapus = mysqli_query($dbcon,"DELETE FROM online WHERE nick='$Uname'");
		session_start();
		session_destroy();
		echo"<script>alert('Terimakasih, anda berhasil logout')</script>";
		echo"<meta http-equiv='refresh' content='1 url=../index.php'>";
	}








//========================================================================================================================================


//========================================================================================================================================

//==========================================================================================================================
	// ini untuk simpan jurnal User
	//==========================================================================================================================

	else if($page=='smpnJrnlPeg'){
		$id_usr_peg = $_GET['id_usr_peg'];
		$bulan = $_POST['bulan'];
		$tahun = $_POST['tahun'];
		$ringkasan_jrnl_peg = $_POST['ringkasan_jrnl_peg'];
		$hsl_jrnl_peg = $_POST['hsl_jrnl_peg'];
		$persentase_jrnl_peg = $_POST['persentase_jrnl_peg'];
		$sts_jrnl_peg = $_POST['sts_jrnl_peg'];
		$ket_jrnl_peg = $_POST['ket_jrnl_peg'];
		$smpnJrnlPeg = mysqli_query($dbcon,"INSERT INTO tbl_jrnl_peg(bln_jrnl_peg,thn_jrnl_peg,ringkasan_jrnl_peg,hsl_jrnl_peg,sts_jrnl_peg,persentase_jrnl_peg,ket_jrnl_peg,id_usr_peg)VALUES('$bulan','$tahun','$ringkasan_jrnl_peg','$hsl_jrnl_peg','$sts_jrnl_peg','$persentase_jrnl_peg','$ket_jrnl_peg','$id_usr_peg')");
	}

	//==========================================================================================================================
	// ini untuk tampil jurnal User
	//==========================================================================================================================

	else if($page=='tmplJrnlPeg'){
		$no = 0;
		$id_usr_peg = $_GET['id_usr_peg'];
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
	}

	//==========================================================================================================================
	// ini untuk perbarui jurnal User
	//==========================================================================================================================

	else if($page=='perbaruiJrnlPeg'){
		$id_jrnl_peg = $_POST['id_jrnl_peg'];
		$ringkasan_jrnl_peg = $_POST['ringkasan_jrnl_peg'];
		$hsl_jrnl_peg = $_POST['hsl_jrnl_peg'];
		$persentase_jrnl_peg = $_POST['persentase_jrnl_peg'];
		$sts_jrnl_peg = $_POST['sts_jrnl_peg'];
		$ket_jrnl_peg = $_POST['ket_jrnl_peg'];
		$perbaruiJrnlPeg = mysqli_query($dbcon,"UPDATE tbl_jrnl_peg SET ringkasan_jrnl_peg='$ringkasan_jrnl_peg',hsl_jrnl_peg='$hsl_jrnl_peg',persentase_jrnl_peg='$persentase_jrnl_peg',sts_jrnl_peg='$sts_jrnl_peg',ket_jrnl_peg='$ket_jrnl_peg' WHERE id_jrnl_peg='$id_jrnl_peg'");
	}

	//==========================================================================================================================
	// ini untuk hapus jurnal User
	//==========================================================================================================================

	else if($page=='hpsJrnlPeg'){
		$id_jrnl_peg = $_POST['id_jrnl_peg'];
		$hapus = mysqli_query($dbcon,"DELETE FROM tbl_jrnl_peg WHERE id_jrnl_peg='$id_jrnl_peg'");
	}

//========================================================================================================================================

//==========================================================================================================================
	// ini untuk simpan Komentar
	//==========================================================================================================================

	else if($page=='smpnKom'){
		$Pengirim = $_POST['Pengirim'];
		$Kom = $_POST['Kom'];
		$smpnKom = mysqli_query($dbcon,"INSERT INTO tbl_Komen(Pengirim,Kom)VALUES('$Pengirim','$Kom')");
	}

	//==========================================================================================================================
	// ini untuk tampil Komentar
	//==========================================================================================================================

	else if($page=='tmplKom'){
		$no = 0;
		$tmplKom = mysqli_query($dbcon,"SELECT * FROM tbl_Komen ORDER BY IdKom");
		while($barisKom = mysqli_fetch_array($tmplKom)){
			$no++;
			echo "<tr>";
			echo "<td>".$no."</td>";
			echo "<td>".$barisKom['Pengirim']."</td>";
			echo "<td>".$barisKom['Kom']."</td>";
			?>
			<td>
				<button type="button" class="btn btn-danger" onclick="vldsconKom('<?php echo $barisKom['IdKom'] ?>')"><span class="glyphicon glyphicon-trash"></span></button>
			</td>
			<?php
			echo "</td>";
			echo "</tr>";
		}
	}

	//==========================================================================================================================
	// ini untuk hapus Komentar
	//==========================================================================================================================

	else if($page=='hpsKom'){
		$IdKom = $_POST['IdKom'];
		$hapus = mysqli_query($dbcon,"DELETE FROM tbl_Komen WHERE IdKom='$IdKom'");
	}

//========================================================================================================================================

	//==========================================================================================================================
	// ini untuk tampil Agama
	//==========================================================================================================================
		else if($page == 'tmplAgm'){
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
		}
	//==========================================================================================================================
	// ini untuk simpan Agama
	//==========================================================================================================================
		else if($page == 'smpnAgm'){
			$IdAgm = $_POST['IdAgm'];
			$NmAgm = $_POST['NmAgm'];
			$smpn = mysqli_query($dbcon,"INSERT INTO tbl_Agm(IdAgm, NmAgm) VALUES ('$IdAgm','$NmAgm')");
		}
	//==========================================================================================================================
	// ini untuk hapus Agama
	//==========================================================================================================================
		else if($page == 'hpsAgm'){
			$IdAgm = $_POST['IdAgm'];
			$hps = mysqli_query($dbcon,"DELETE FROM tbl_Agm WHERE IdAgm = '$IdAgm'");
		}
	//==========================================================================================================================
	// ini untuk perbarui Agama
	//==========================================================================================================================
		else if($page == 'perbaruiAgm'){
			$IdAgm = $_POST['IdAgm'];
			$NmAgm = $_POST['NmAgm'];
			$perbaruiAgm = mysqli_query($dbcon,"UPDATE tbl_Agm SET NmAgm='$NmAgm' WHERE IdAgm='$IdAgm'");
		}


//========================================================================================================================================

	//==========================================================================================================================
	// ini untuk tampil Jabatan
	//==========================================================================================================================
		else if($page == 'tmplJbtn'){
			$tmplJbtn = mysqli_query($dbcon,"SELECT * FROM tbl_Jbtn ORDER BY IdJbtn");
			while($data = mysqli_fetch_array($tmplJbtn)){
				echo"<tr>";
				echo"<td>".$data['IdJbtn']."</td>";
				echo"<td>".$data['NmJbtn']."</td>";
				echo"<td>".$data['Level']."</td>";
				?>
				<td>
					<button type="button" class="btn btn-success" onclick="editJbtn('<?php echo $data['IdJbtn']; ?>','<?php echo $data['NmJbtn']; ?>','<?php echo $data['Gapok']; ?>','<?php echo $data['Level']; ?>','<?php echo $data['TunjanganJbtn']; ?>')" cl ><span class="glyphicon glyphicon-edit"></span></button>
					<button type="button" class="btn btn-danger" onclick="vldsconJbtn('<?php echo $data['IdJbtn'] ?>')"><span class="glyphicon glyphicon-trash"></span></button>
				</td>
				<?php
				echo"</tr>";
			}
		}
	//==========================================================================================================================
	// ini untuk simpan Jabatan
	//==========================================================================================================================
		else if($page == 'smpnJbtn'){
			$IdJbtn = $_POST['IdJbtn'];
			$NmJbtn = $_POST['NmJbtn'];
			$Gapok = $_POST['Gapok'];
			$Level = $_POST['Level'];
			$TunjanganJbtn = $_POST['TunjanganJbtn'];
			$smpn = mysqli_query($dbcon,"INSERT INTO tbl_Jbtn(IdJbtn, NmJbtn, Gapok, Level, TunjanganJbtn) VALUES ('$IdJbtn','$NmJbtn','$Gapok', '$Level', '$TunjanganJbtn')");
		}
	//==========================================================================================================================
	// ini untuk hapus Jabatan
	//==========================================================================================================================
		else if($page == 'hpsJbtn'){
			$IdJbtn = $_POST['IdJbtn'];
			$hps = mysqli_query($dbcon,"DELETE FROM tbl_Jbtn WHERE IdJbtn = '$IdJbtn'");
		}
	//==========================================================================================================================
	// ini untuk perbarui Jabatan
	//==========================================================================================================================
		else if($page == 'perbaruiJbtn'){
			$IdJbtn = $_POST['IdJbtn'];
			$NmJbtn = $_POST['NmJbtn'];
			$Gapok = $_POST['Gapok'];
			$Level = $_POST['Level'];
			$TunjanganJbtn = $_POST['TunjanganJbtn'];
			$perbaruiJbtn = mysqli_query($dbcon,"UPDATE tbl_Jbtn SET NmJbtn='$NmJbtn', Gapok='$Gapok', Level='$Level', TunjanganJbtn='$TunjanganJbtn' WHERE IdJbtn='$IdJbtn'");
		}

//========================================================================================================================================

	//==========================================================================================================================
	// ini untuk tampil User
	//==========================================================================================================================
		else if($page == 'tmplUser'){
			$tmplUser = mysqli_query($dbcon,"SELECT * FROM tbl_User ORDER BY Id_User");
			while($data = mysqli_fetch_array($tmplUser)){
				echo"<tr>";
				echo"<td>".$data['Id_User']."</td>";
				echo"<td>".$data['Uname']."</td>";
				?>
				<td>
				<button type="button" class="btn btn-success" onclick="editUser('<?php echo $data['Id_User'] ?>','<?php echo $data['Uname'] ?>','<?php echo $data['Pass'] ?>','<?php echo $data['Lvl'] ?>')" cl ><span class="glyphicon glyphicon-edit"></span></button>
				<button type="button" class="btn btn-danger" onclick="vldsconUser('<?php echo $data['Id_User'] ?>')"><span class="glyphicon glyphicon-trash"></span></button>
				</td>
				<?php
				echo"</tr>";
			}
		}
	//==========================================================================================================================
	// ini untuk tampil User Man
	//==========================================================================================================================
		else if($page == 'tmplUserM'){
			$tmplUser = mysqli_query($dbcon,"SELECT * FROM tbl_User WHERE Id_User != 1 ORDER BY Id_User");
			while($data = mysqli_fetch_array($tmplUser)){
				echo"<tr>";
				echo"<td>".$data['Id_User']."</td>";
				echo"<td>".$data['Uname']."</td>";
				?>
				<td>
				<button type="button" class="btn btn-success" onclick="editUserM('<?php echo $data['Id_User'] ?>','<?php echo $data['Uname'] ?>','<?php echo $data['Pass'] ?>','<?php echo $data['Lvl'] ?>')" cl ><span class="glyphicon glyphicon-edit"></span></button>
				<button type="button" class="btn btn-danger" onclick="vldsconUserM('<?php echo $data['Id_User'] ?>')"><span class="glyphicon glyphicon-trash"></span></button>
				</td>
				<?php
				echo"</tr>";
			}
		}
	//==========================================================================================================================
	// ini untuk simpan User
	//==========================================================================================================================
		else if($page == 'smpnUser'){
			$Id_User = $_POST['Id_User'];
			$Uname = $_POST['Uname'];
			$Pass = $_POST['Pass'];
			$Lvl = $_POST['Lvl'];
			$smpn = mysqli_query($dbcon,"INSERT INTO tbl_User(Id_User, Uname, Pass, Lvl) VALUES ('$Id_User','$Uname','$Pass','$Lvl')");
		}
	//==========================================================================================================================
	// ini untuk hapus User
	//==========================================================================================================================
		else if($page == 'hpsUser'){
			$Id_User = $_POST['Id_User'];
			$ambil_NoPeg = mysqli_query($dbcon,"SELECT * FROM tbl_ProfPeg WHERE Id_User = '$Id_User'");
			$terambi_NoPeg = mysqli_fetch_array($ambil_NoPeg);
			$NomPeg = $terambil_NoPeg['NoPeg'];
			$hps = mysqli_query($dbcon,"DELETE FROM tbl_BioPeg WHERE NoPeg = '$NomPeg'");
			$hps1 = mysqli_query($dbcon,"DELETE FROM tbl_GajiPeg WHERE NoPeg = '$NomPeg'");
			$hps2 = mysqli_query($dbcon,"DELETE FROM tbl_ProfPeg WHERE NoPeg = '$NomPeg'");
			$hps3 = mysqli_query($dbcon,"DELETE FROM tbl_User WHERE Id_User = '$Id_User'");

		}
	//==========================================================================================================================
	// ini untuk perbarui User
	//==========================================================================================================================
		else if($page == 'perbaruiUser'){
			$Id_User = $_POST['Id_User'];
			$Uname = $_POST['Uname'];
			$Pass = $_POST['Pass'];
			$Lvl = $_POST['Lvl'];
			$perbaruiUser = mysqli_query($dbcon,"UPDATE tbl_User SET Uname='$Uname', Pass='$Pass', Lvl='$Lvl' WHERE Id_User='$Id_User'");
		}


	//========================================================================================================================================

	//==========================================================================================================================
	// ini untuk tampil Profil Pegawai
	//==========================================================================================================================
		else if($page == 'tmplProfPeg'){
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
		}
	//==========================================================================================================================
	// ini untuk simpan Profil Pegawai
	//==========================================================================================================================
		else if($page == 'smpnProfPeg'){
			$NoPeg = $_POST['NoPeg'];
			$NmPeg = $_POST['NmPeg'];
			$TglGabung = $_POST['TglGabung'];
			$Id_User = $_POST['Id_User'];
			$slct_ID = mysqli_query($dbcon,"SELECT Id_User FROM tbl_ProfPeg");
			$ID = mysqli_fetch_array($slct_ID);
			$bln=date('m'); echo $bln;
			$thn=date('Y'); echo $bln;
			if($Id_User != $ID['Id_User']){
				echo"<script>alert('Data Berhasil Ditambahkan')</script>";
				$smpn = mysqli_query($dbcon,"INSERT INTO tbl_ProfPeg(NoPeg, NmPeg, TglGabung, Id_User) VALUES ('$NoPeg','$NmPeg','$TglGabung','$Id_User')");
				$smpn1 = mysqli_query($dbcon,"INSERT INTO tbl_BioPeg(NoPeg, TmptLhr, TglLhr, Gndr, Almt, NoTelp, Agm, StsNkh, JmlhAnak, AnakNikah, Kewarganegaraan, Jbtn, PndAkr, Email, GolDar, ContDar, NoKTP, NoKK) VALUES('$NoPeg', '', '', '', '', '', '', '', '', '', '', '', '','' ,'', '', '', '')");
				$smpn2 = mysqli_query($dbcon,"INSERT INTO tbl_GajiPeg(NoPeg, TunjanganJbtn, TunjanganPerumahan, TunjanganTransport, TunjanganIstri, TunjanganAnak, TunjanganKebijakan, THR, PotIuranJamsostek, PotIuranBPJS, PotIuranKop, DendaLambat, PotMinCuti, Cash, Bln, Thn) VALUES ('$NoPeg', '', '', '', '', '', '', '', '', '' ,'' ,'', '', '', '$bln', '$thn')");
			}else{
				echo"<script>alert('Data Gagal di tambah ... ID USER SAMA')</script>";
			}
		}
	//==========================================================================================================================
	// ini untuk hapus Profil Pegawai
	//==========================================================================================================================
		else if($page == 'hpsProfPeg'){
			$NoPeg = $_POST['NoPeg'];
			$hps = mysqli_query($dbcon,"DELETE FROM tbl_BioPeg WHERE NoPeg = '$NoPeg'");
			$hps1 = mysqli_query($dbcon,"DELETE FROM tbl_GajiPeg WHERE NoPeg = '$NoPeg'");
			$hps2 = mysqli_query($dbcon,"DELETE FROM tbl_ProfPeg WHERE NoPeg = '$NoPeg'");
		}
	//==========================================================================================================================
	// ini untuk perbarui Profil Pegawai
	//==========================================================================================================================
		else if($page == 'perbaruiProfPeg'){
			$NoPeg = $_POST['NoPeg'];
			$NmPeg = $_POST['NmPeg'];
			$TglGabung = $_POST['TglGabung'];
			$Id_User = $_POST['Id_User'];
			$perbaruiUser = mysqli_query($dbcon,"UPDATE tbl_ProfPeg SET NoPeg='$NoPeg', NmPeg='$NmPeg', TglGabung='$TglGabung', Id_User='$Id_User' WHERE NoPeg='$NoPeg'");
		}



	//========================================================================================================================================

	//==========================================================================================================================
	// ini untuk tampil Biografi Pegawai
	//==========================================================================================================================
		else if($page == 'tmplBioPeg'){
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
				<button type="button" class="btn btn-success" onclick="editBioPeg('<?php echo $DtNoPeg ?>', '<?php echo $dataBio['TmptLhr']; ?>', '<?php echo $dataBio['TglLhr']; ?>', '<?php echo $dataBio['Gndr']; ?>', '<?php echo $dataBio['Almt']; ?>', '<?php echo $dataBio['NoTelp']; ?>', '<?php echo $dataBio['Agm']; ?>', '<?php echo $dataBio['StsNkh']; ?>', '<?php echo $dataBio['JmlhAnak']; ?>', '<?php echo $dataBio['AnakNikah']; ?>', '<?php echo $dataBio['Kewarganegaraan']; ?>', '<?php echo $dataBio['Jbtn']; ?>', '<?php echo $dataBio['PndAkr']; ?>', '<?php echo $dataBio['Email']; ?>', '<?php echo $dataBio['GolDar']; ?>', '<?php echo $dataBio['ContDar']; ?>', '<?php echo $dataBio['NoKTP']; ?>', '<?php echo $dataBio['NoKK']; ?>')" cl ><span class="glyphicon glyphicon-edit"></span></button>
				<button type="button" class="btn btn-danger" onclick="vldsconBioPeg('<?php echo $data['NoPeg'] ?>')"><span class="glyphicon glyphicon-trash"></span></button>
				</td>
				<?php
				echo"</tr>";
			}
		}
	//==========================================================================================================================
	// ini untuk Perbarui Biografi Pegawai
	//==========================================================================================================================
		else if($page == 'perbaruiBioPeg'){
			$NoPeg = $_POST['NoPeg2'];
			$TmptLhr = $_POST['TmptLhr'];
			$TglLhr = $_POST['TglLhr'];
			$Gndr = $_POST['Gndr'];
			$Almt = $_POST['Almt'];
			$NoTelp = $_POST['NoTelp'];
			$Agm = $_POST['Agm'];
			$StsNkh = $_POST['StsNkh'];
			$JmlhAnak = $_POST['JmlhAnak'];
			$AnakNikah = $_POST['AnakNikah'];
			$Kewarganegaraan = $_POST['Kewarganegaraan'];
			$Jbtn = $_POST['Jbtn'];
			$PndAkr = $_POST['PndAkr'];
			$Email = $_POST['Email'];
			$GolDar = $_POST['GolDar'];
			$ContDar = $_POST['ContDar'];
			$NoKTP = $_POST['NoKTP'];
			$NoKK = $_POST['NoKK'];
			$TunjanganAnak = 5 * ($JmlhAnak-$AnakNikah);
			$ambilTunjanganJbtn = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_jbtn WHERE IdJbtn = '$Jbtn'"));
			$TunjanganJbtn2 = $ambilTunjanganJbtn['TunjanganJbtn'];
			$smpn = mysqli_query($dbcon,"UPDATE tbl_BioPeg SET NoPeg='$NoPeg',TmptLhr='$TmptLhr', TglLhr='$TglLhr', Gndr='$Gndr', Almt='$Almt', NoTelp='$NoTelp', Agm='$Agm', StsNkh='$StsNkh', JmlhAnak='$JmlhAnak', AnakNikah='$AnakNikah', Kewarganegaraan='$Kewarganegaraan', Jbtn='$Jbtn', PndAkr='$PndAkr', Email='$Email', GolDar='$GolDar', ContDar='$ContDar', NoKTP='$NoKTP', NoKK='$NoKK' WHERE NoPeg='$NoPeg'");
			$smpn1= mysqli_query($dbcon,"UPDATE tbl_GajiPeg SET TunjanganJbtn='$TunjanganJbtn2', TunjanganAnak='$TunjanganAnak' WHERE NoPeg='$NoPeg'");
		}
	//==========================================================================================================================
	// ini untuk bersihkan Biografi Pegawai
	//==========================================================================================================================
		else if($page == 'brshBioPeg'){
			$NoPeg = $_POST['NoPeg'];
			$hps = mysqli_query($dbcon,"UPDATE tbl_BioPeg SET NoPeg='$NoPeg',TmptLhr='', TglLhr='', Gndr='', Almt='', NoTelp='', Agm='', StsNkh='', JmlhAnak='', AnakNikah='', Kewarganegaraan='', Jbtn='', PndAkr='', Email='', GolDar='', ContDar='', NoKTP='', NoKK='' WHERE NoPeg='$NoPeg'");
		}


//========================================================================================================================================

	//==========================================================================================================================
	// ini untuk tampil Absensi Pegawai
	//==========================================================================================================================
		else if($page == 'tmplAbsPeg'){
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
				<button type="button" class="btn btn-success" onclick="editAbsPeg('<?php echo $data['NoPeg']; ?>', '<?php echo $data['Hdr']; ?>', '<?php echo $data['Alf']; ?>', '<?php echo $data['Skt']; ?>', '<?php echo $data['Izn']; ?>', '<?php echo $data['Terlambat']; ?>', '<?php echo $data['OverTime']; ?>', '<?php echo $data['Bln']; ?>', '<?php echo $data['Thn']; ?>')" cl ><span class="glyphicon glyphicon-edit"></span></button>
				<button type="button" class="btn btn-danger" onclick="vldsconAbsPeg('<?php echo $data['IdAbs'] ?>', '<?php echo $data['NoPeg']; ?>', '<?php echo $data['Bln']; ?>', '<?php echo $data['Thn']; ?>')" cl ><span class="glyphicon glyphicon-trash"></span></button>
				</td>
				<?php
				echo"</tr>";
			}
		}
	//==========================================================================================================================
	// ini untuk Simpan Absensi Pegawai
	//==========================================================================================================================

		else if($page == 'smpnAbsPeg'){
			$NoPeg = $_POST['NoPeg4'];
			$Hdr = $_POST['Hdr'];
			$Alf = $_POST['Alf'];
			$Skt = $_POST['Skt'];
			$Izn = $_POST['Izn'];
			$Terlambat = $_POST['Terlambat'];
			$OverTime = $_POST['OverTime'];
			$Bln = $_POST['Bln'];
			$Thn = $_POST['Thn'];
			$nlTerlambat = 10000 * $Terlambat;
			$nlKetidakhadiran = 50000 * ($Alf+$Skt+$Izn);
			$smpn = mysqli_query($dbcon,"INSERT INTO tbl_Abs (NoPeg,Hdr,Alf,Skt,Izn,Terlambat,OverTime,Bln,Thn) VALUES ('$NoPeg','$Hdr','$Alf','$Skt','$Izn','$Terlambat','$OverTime','$Bln','$Thn')");
			$smpn1= mysqli_query($dbcon,"UPDATE tbl_GajiPeg SET DendaLambat='$nlTerlambat', DendaKetidakhadiran='$nlKetidakhadiran' WHERE NoPeg='$NoPeg' && Bln='$Bln'");
		}

	//==========================================================================================================================
	// ini untuk Perbarui Absensi Pegawai
	//==========================================================================================================================
		else if($page == 'perbaruiAbsPeg'){
			$NoPeg = $_POST['NoPeg4'];
			$Hdr = $_POST['Hdr'];
			$Alf = $_POST['Alf'];
			$Skt = $_POST['Skt'];
			$Izn = $_POST['Izn'];
			$Terlambat = $_POST['Terlambat'];
			$OverTime = $_POST['OverTime'];
			$Bln = $_POST['Bln'];
			$Thn = $_POST['Thn'];
			$nlTerlambat = 10000 * $Terlambat;
			$nlKetidakhadiran = 50000 * ($Alf+$Skt+$Izn);
			$perbarui = mysqli_query($dbcon,"UPDATE tbl_Abs SET NoPeg='$NoPeg', Hdr='$Hdr', Alf='$Alf', Skt='$Skt', Izn='$Izn', Terlambat='$Terlambat', OverTime='$OverTime', Bln='$Bln', Thn='$Thn' WHERE NoPeg='$NoPeg' && Bln = '$Bln'");
			$perbarui2= mysqli_query($dbcon,"UPDATE tbl_GajiPeg SET DendaLambat='$nlTerlambat', DendaKetidakhadiran='$nlKetidakhadiran' WHERE NoPeg='$NoPeg' && Bln='$Bln'");
			if($perbarui2){
				echo"Sukses";
			}else{
				echo"Gagal",mysqli_error($dbcon);
			}
		}
	//==========================================================================================================================
	// ini untuk Hapus Absensi Pegawai
	//==========================================================================================================================
		else if($page == 'hpsAbsPeg'){
			$IdAbs = $_POST['IdAbs'];
			$NoPeg = $_POST['NoPeg'];
			$Bln = $_POST['Bln'];
			$Thn = $_POST['Thn'];
			$hps = mysqli_query($dbcon,"DELETE FROM tbl_Abs WHERE IdAbs = '$IdAbs'");
			$hps2= mysqli_query($dbcon,"UPDATE tbl_GajiPeg SET DendaLambat='', DendaKetidakhadiran='' WHERE NoPeg='$NoPeg'&& Bln='$Bln'&& Thn='$Thn'");
		}



//========================================================================================================================================

	//==========================================================================================================================
	// ini untuk tampil Gaji Pegawai
	//==========================================================================================================================
		else if($page == 'tmplGajiPeg'){
			$amblGaji = mysqli_query($dbcon,"SELECT tbl_GajiPeg.IdGaji, tbl_GajiPeg.NoPeg, tbl_GajiPeg.TunjanganJbtn, tbl_GajiPeg.TunjanganPerumahan, tbl_GajiPeg.TunjanganTransport, tbl_GajiPeg.TunjanganIstri, tbl_GajiPeg.TunjanganAnak, tbl_GajiPeg.TunjanganKebijakan, tbl_GajiPeg.THR,tbl_GajiPeg.Cash, tbl_GajiPeg.PotIuranJamsostek, tbl_GajiPeg.PotIuranBPJS, tbl_GajiPeg.PotIuranKop, tbl_GajiPeg.DendaLambat, tbl_GajiPeg.DendaKetidakhadiran, tbl_GajiPeg.PotMinCuti, tbl_GajiPeg.Bln, tbl_GajiPeg.Thn, tbl_GajiPeg.Waktu, tbl_ProfPeg.NmPeg FROM tbl_GajiPeg INNER JOIN tbl_ProfPeg ON tbl_GajiPeg.NoPeg=tbl_ProfPeg.NoPeg");
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
				<button type="button" class="btn btn-success" onclick="editGajiPeg('<?php echo $dataGaji['NoPeg'] ?>','<?php echo $dataGaji['Bln'] ?>','<?php echo $dataGaji['Thn'] ?>','<?php echo $nilaiTunjJbtn['TunjanganJbtn'] ?>','<?php echo $dataGaji['TunjanganPerumahan'] ?>','<?php echo $dataGaji['TunjanganTransport'] ?>','<?php echo $dataGaji['TunjanganIstri'] ?>','<?php echo $dataGaji['TunjanganAnak'] ?>','<?php echo $dataGaji['TunjanganKebijakan'] ?>','<?php echo $dataGaji['THR'] ?>','<?php echo $dataGaji['Cash'] ?>','<?php echo $dataGaji['PotIuranJamsostek'] ?>','<?php echo $dataGaji['PotIuranBPJS'] ?>','<?php echo $dataGaji['PotIuranKop'] ?>','<?php echo $dataGaji['DendaLambat'] ?>','<?php echo $dataGaji['DendaKetidakhadiran'] ?>','<?php echo $dataGaji['PotMinCuti'] ?>')" cl ><span class="glyphicon glyphicon-edit"></span></button>
				<button type="button" class="btn btn-danger" onclick="vldsconGajiPeg('<?php echo $dataGaji['IdGaji']; ?>')"><span class="glyphicon glyphicon-trash"></span></button>
				</td>
				<?php
				echo"</tr>";
			}
		}

	//==========================================================================================================================
	// ini untuk Simpan Gaji Pegawai
	//==========================================================================================================================
		else if($page == 'smpnGajiPeg'){
			$NoPeg = $_POST['NoPeg3'];
			$ambildataBio = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_BioPeg WHERE NoPeg = '$NoPeg'"));
			$Jbtn = $ambildataBio['Jbtn'];
			$JmlhAnak = $ambildataBio['JmlhAnak'];
			$AnakNikah = $ambildataBio['AnakNikah'];
			$TunjanganAnak = 5 * ($JmlhAnak-$AnakNikah);
			$ambilTunjanganJbtn = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_jbtn WHERE IdJbtn = '$Jbtn'"));
			$TunjanganJbtn2 = $ambilTunjanganJbtn['TunjanganJbtn'];
			$Bulan = $_POST['Bulan'];
			$Tahun = $_POST['Tahun'];
			$TunjanganPerumahan = $_POST['TunjanganPerumahan'];
			$TunjanganTransport = $_POST['TunjanganTransport'];
			$TunjanganIstri = $_POST['TunjanganIstri'];
			$TunjanganKebijakan = $_POST['TunjanganKebijakan'];
			$THR = $_POST['THR'];
			$Cash = $_POST['Cash'];
			$PotIuranJamsostek = $_POST['PotIuranJamsostek'];
			$PotIuranBPJS = $_POST['PotIuranBPJS'];
			$PotIuranKop = $_POST['PotIuranKop'];
			$PotMinCuti = $_POST['PotMinCuti'];
			$smpn = mysqli_query($dbcon,"INSERT INTO tbl_GajiPeg (NoPeg, Bln, Thn, TunjanganJbtn, TunjanganPerumahan, TunjanganTransport, TunjanganIstri, TunjanganAnak, TunjanganKebijakan, THR, Cash, PotIuranJamsostek, PotIuranBPJS, PotIuranKop, PotMinCuti) VALUES ('$NoPeg', '$Bulan', '$Tahun', '$TunjanganJbtn2', '$TunjanganPerumahan', '$TunjanganTransport', '$TunjanganIstri', '$TunjanganAnak', '$TunjanganKebijakan', '$THR', '$Cash', '$PotIuranJamsostek', '$PotIuranBPJS', '$PotIuranKop', '$PotMinCuti')");
			if($smpn){
				echo"Berhasil";
			}else{
				echo"Gagal".mysqli_error($dbcon);
			}
		}
	//==========================================================================================================================
	// ini untuk Perbarui Gaji Pegawai
	//==========================================================================================================================
		else if($page == 'perbaruiGajiPeg'){
			$NoPeg = $_POST['NoPeg3'];
			$TunjanganPerumahan = $_POST['TunjanganPerumahan'];
			$TunjanganTransport = $_POST['TunjanganTransport'];
			$TunjanganIstri = $_POST['TunjanganIstri'];
			$TunjanganAnak = $_POST['TunjanganAnak'];
			$TunjanganKebijakan = $_POST['TunjanganKebijakan'];
			$THR = $_POST['THR'];
			$Cash = $_POST['Cash'];
			$PotIuranJamsostek = $_POST['PotIuranJamsostek'];
			$PotIuranBPJS = $_POST['PotIuranBPJS'];
			$PotIuranKop = $_POST['PotIuranKop'];
			$PotMinCuti = $_POST['PotMinCuti'];
			$perbarui = mysqli_query($dbcon,"UPDATE tbl_GajiPeg SET NoPeg='$NoPeg', TunjanganPerumahan='$TunjanganPerumahan', TunjanganTransport='$TunjanganTransport', TunjanganIstri='$TunjanganIstri', TunjanganAnak='$TunjanganAnak', TunjanganKebijakan='$TunjanganKebijakan', THR='$THR', Cash='$Cash', PotIuranJamsostek='$PotIuranJamsostek', PotIuranBPJS='$PotIuranBPJS', PotIuranKop='$PotIuranKop', PotMinCuti='$PotMinCuti' WHERE NoPeg='$NoPeg'");
		}
	//==========================================================================================================================
	// ini untuk Hapus Gaji Pegawai
	//==========================================================================================================================
		else if($page == 'hapusGajiPeg'){
			$IdGaji = $_POST['IdGaji'];
			$hps = mysqli_query($dbcon,"DELETE FROM tbl_GajiPeg WHERE IdGaji = '$IdGaji'");
		}

//========================================================================================================================================

	//==========================================================================================================================
	// ini untuk tampil Filter Gaji Pegawai
	//==========================================================================================================================
		else if($page == 'tmplFilGaji'){
			$tmplProfPeg = mysqli_query($dbcon,"SELECT * FROM tbl_ProfPeg ORDER BY NoPeg");
			while($data = mysqli_fetch_array($tmplProfPeg)){
				$DtNoPeg = $data['NoPeg'];
				$tmplBioPeg = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_BioPeg WHERE NoPeg='$DtNoPeg'"));
				$Jbtn = $tmplBioPeg['Jbtn'];
				$tmplGapok = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_jbtn WHERE IdJbtn = '$Jbtn'"));
				$Gapok = $tmplGapok['Gapok'];
				$ambilgaji = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_GajiPeg Where NoPeg='$DtNoPeg'"));
				$amblabs = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_Abs WHERE NoPeg='$DtNoPeg'"));
				// ===========================================
				$nlTunjanganJbtn = $Gapok/100 * $ambilgaji['TunjanganJbtn'];
				$nlTunjanganPerumahan = $Gapok/100 * $ambilgaji['TunjanganPerumahan'];
				$nlTunjanganTransport = $Gapok/100 * $ambilgaji['TunjanganTransport'];
				$nlTunjanganIstri = $Gapok/100 * $ambilgaji['TunjanganIstri'];
				$nlTunjanganAnak = $Gapok/100 * $ambilgaji['TunjanganAnak'];
				$nlTunjanganKebijakan = $ambilgaji['TunjanganKebijakan'];
				$nlTHR = $Gapok/100 * $ambilgaji['THR'];
				$OverTime = $amblabs['OverTime'];
				$nlOverTime = $OverTime*20000;
				$Tunjangan = array($nlTunjanganJbtn, $nlTunjanganPerumahan, $nlTunjanganTransport, $nlTunjanganIstri, $nlTunjanganAnak, $nlTunjanganKebijakan, $nlOverTime);
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
		}

	//==========================================================================================================================
	// ini untuk simpan foto
	//==========================================================================================================================

	else if($page=='uploadfotopeg'){
		$id_usr_peg = $_POST['id_usr_peg'];
		$ambil_nm_peg = mysqli_query($dbcon,"SELECT * FROM tbl_user_peg WHERE id_usr_peg='$id_usr_peg'");
		$terambil_nm = mysqli_fetch_array($ambil_nm_peg);
		$username = $terambil_nm['username_peg'];
		$ft_peg = $_FILES['ft_peg']['name'];
		$tmp = $_FILES['ft_peg']['tmp_name'];

		$ft_peg_br = date('dmYHis').$ft_peg;
		$path_ft_peg = "../images/user/".$ft_peg_br;

		if(move_uploaded_file($tmp, $path_ft_peg)){
			$uploadfotopeg = mysqli_query($dbcon,"UPDATE tbl_peg SET ft_peg='$ft_peg_br' WHERE id_usr_peg='$id_usr_peg'");
			if($uploadfotopeg){
				header('location: ../biodata_peg.php?id_usr_peg='.$id_usr_peg.'&username_peg='.$username);
			}else{
				echo"error";
			}
		}else{
			echo"Gambar gagal diupload";
		}

	}
?>
