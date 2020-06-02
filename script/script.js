//=============================================
//Tampil Jurnal
//=============================================
$('table').dataTable();
$('#perbaruijrnlpeg').prop("disabled",true);
function tmplJrnlPeg(){
	var id_usr_peg = $('#id_usr_peg').val()
	$.get('config/server.php?p=tmplJrnlPeg&id_usr_peg='+id_usr_peg, function(data){
		$('tbody').html(data)
	})
}

//=============================================
//Simpan data jurnal
//=============================================

function smpnJrnlPeg(){
	var id_usr_peg = $('#id_usr_peg').val()
	var bulan = $('#bulan').val()
	var tahun = $('#tahun').val()
	var ringkasan_jrnl_peg = $('#ringkasan_jrnl_peg').val()
	var hsl_jrnl_peg = $('#hsl_jrnl_peg').val()
	var persentase_jrnl_peg = $('#persentase_jrnl_peg').val()
	var sts_jrnl_peg = $('#sts_jrnl_peg').val()
	var ket_jrnl_peg = $('#ket_jrnl_peg').val()
	$.post('config/server.php?p=smpnJrnlPeg&id_usr_peg='+id_usr_peg, {bulan:bulan, tahun:tahun, ringkasan_jrnl_peg:ringkasan_jrnl_peg, hsl_jrnl_peg:hsl_jrnl_peg, persentase_jrnl_peg:persentase_jrnl_peg, sts_jrnl_peg:sts_jrnl_peg, ket_jrnl_peg:ket_jrnl_peg}, function(data){
		tmplJrnlPeg()
		$('#ringkasan_jrnl_peg').val('')
		$('#hsl_jrnl_peg').val('')
		$('#persentase_jrnl_peg').val('')
		$('#sts_jrnl_peg').val('')
		alert('Data berhasil ditambahkan')
	})
}

//=============================================
//Edit data jurnal
//=============================================

function editJrnlPeg(id_jrnl_peg, ringkasan_jrnl_peg, hsl_jrnl_peg, persentase_jrnl_peg, sts_jrnl_peg, ket_jrnl_peg){
	$('#id_jrnl_peg').val(id_jrnl_peg)
	$('#ringkasan_jrnl_peg').val(ringkasan_jrnl_peg)
	$('#hsl_jrnl_peg').val(hsl_jrnl_peg)
	$('#persentase_jrnl_peg').val(persentase_jrnl_peg)
	$('#sts_jrnl_peg').val(sts_jrnl_peg)
	$('#ket_jrnl_peg').val(ket_jrnl_peg)
	$('#smpnjrnlpeg').prop("disabled",true);
	$('#perbaruijrnlpeg').prop("disabled",false);

}

//=============================================
//Perbarui data jurnal
//=============================================

function perbaruiJrnlPeg(){
	var id_jrnl_peg = $('#id_jrnl_peg').val()
	var ringkasan_jrnl_peg = $('#ringkasan_jrnl_peg').val()
	var hsl_jrnl_peg = $('#hsl_jrnl_peg').val()
	var persentase_jrnl_peg = $('#persentase_jrnl_peg').val()
	var sts_jrnl_peg = $('#sts_jrnl_peg').val()
	var ket_jrnl_peg = $('#ket_jrnl_peg').val()
	$.post('config/server.php?p=perbaruiJrnlPeg',{id_jrnl_peg:id_jrnl_peg, ringkasan_jrnl_peg:ringkasan_jrnl_peg, hsl_jrnl_peg:hsl_jrnl_peg, persentase_jrnl_peg:persentase_jrnl_peg, sts_jrnl_peg:sts_jrnl_peg, ket_jrnl_peg:ket_jrnl_peg}, function(data){
		tmplJrnlPeg()
		$('#ringkasan_jrnl_peg').val('')
		$('#hsl_jrnl_peg').val('')
		$('#persentase_jrnl_peg').val('')
		$('#sts_jrnl_peg').val('')
		$('#smpnjrnlpeg').prop('disabled',false);
		$('#perbaruijrnlpeg').prop('disabled',true);
		alert('Data berhasil diubah')
	})
}

//=============================================
//Hapus data jurnal
//=============================================

function hpsJrnlPeg(id_jrnl_peg){
	$.post('config/server.php?p=hpsJrnlPeg',{id_jrnl_peg:id_jrnl_peg}, function(data){
		tmplJrnlPeg()
		alert('Data berhasil dihapus')
	})
}

//=============================================
//Validasi data jurnal
//=============================================

function vldsconJrnlPeg(id_jrnl_peg){
	var conJrnlPeg = confirm('Apakah anda yakin menghapus data ini ?');
	if(conJrnlPeg=='1'){
		hpsJrnlPeg(id_jrnl_peg);
	}
}

//====================================================================================================================================


//=============================================
//Simpan data Komentar
//=============================================

function smpnKom(){
	var Pengirim = $('#Pengirim').val()
	var Kom = $('#Kom').val()
	$.post('config/server.php?p=smpnKom', {Pengirim:Pengirim, Kom:Kom}, function(data){
		$('#Pengirim').val('')
		$('#Kom').val('')
		alert('Komentar telah dikirim ')
	})
}

//=============================================
//Hapus data komentar
//=============================================

function hpsKom(IdKom){
	$.post('../../config/server.php?p=hpsKom',{IdKom}, function(data){
		tmplKom()
		alert('Data berhasil dihapus')
	})
}

//=============================================
//Validasi data komentar
//=============================================

function vldsconKom(IdKom){
	var conKom = confirm('Apakah anda yakin menghapus data ini ?');
	if(conKom=='1'){
		hpsKom(IdKom);
	}
}

//====================================================================================================================================

//=============================================
//Tampil Agama
//=============================================
$('table').dataTable();
$('#perbaruiagm').prop("disabled",true);
function tmplAgm(){
	$.get('../../config/server.php?p=tmplAgm', function(data){
		$('tbody').html(data)
	})
}

//=============================================
//Simpan data Agama
//=============================================

function smpnAgm(){
	var IdAgm = $('#IdAgm').val()
	var NmAgm = $('#NmAgm').val()
	if(NmAgm != ''){
	$.post('../../config/server.php?p=smpnAgm', {IdAgm:IdAgm, NmAgm:NmAgm}, function(data){
		tmplAgm()
		$('#IdAgm').val('')
		$('#NmAgm').val('')
		alert('Data berhasil ditambahkan')
	})
	}else{
		alert('Masih Ada textbox yang kosong')
	}
}

//=============================================
//Edit data Agama
//=============================================

function editAgm(IdAgm, NmAgm){
	$('#IdAgm').val(IdAgm)
	$('#NmAgm').val(NmAgm)
	$('#smpnagm').prop("disabled",true);
	$('#perbaruiagm').prop("disabled",false);

}

//=============================================
//Perbarui data Agama
//=============================================

function perbaruiAgm(){
	var IdAgm = $('#IdAgm').val()
	var NmAgm = $('#NmAgm').val()
	$.post('../../config/server.php?p=perbaruiAgm',{IdAgm:IdAgm, NmAgm:NmAgm}, function(data){
		tmplAgm()
		$('#IdAgm').val('')
		$('#NmAgm').val('')
		$('#smpnagm').prop('disabled',false);
		$('#perbaruiagm').prop('disabled',true);
		alert('Data berhasil diubah')
	})
}

//=============================================
//Hapus data Agama
//=============================================

function hpsAgm(IdAgm){
	$.post('../../config/server.php?p=hpsAgm',{IdAgm}, function(data){
		tmplAgm()
		alert('Data berhasil dihapus')
	})
}

//=============================================
//Validasi data Agama
//=============================================

function vldsconAgm(IdAgm){
	var conAgm = confirm('Apakah anda yakin menghapus data ini ?');
	if(conAgm=='1'){
		hpsAgm(IdAgm);
	}
}

//=============================================
//Reset data Agama
//=============================================

function resetAgm(){
	$('#smpnagm').prop('disabled',false);
	$('#perbaruiagm').prop('disabled',true);
}

//====================================================================================================================================

//=============================================
//Tampil Jabatan
//=============================================
$('table').dataTable();
$('#perbaruijbtn').prop("disabled",true);
function tmplJbtn(){
	$.get('../../config/server.php?p=tmplJbtn', function(data){
		$('tbody').html(data)
	})
}

//=============================================
//Simpan data Jabatan
//=============================================

function smpnJbtn(){
	var IdJbtn = $('#IdJbtn').val()
	var NmJbtn = $('#NmJbtn').val()
	var Gapok = $('#Gapok').val()
	var Level = $('#Level').val()
	var TunjanganJbtn = $('TunjanganJbtn').val()
	if(NmJbtn && Gapok && Level && TunjanganJbtn != ''){
	$.post('../../config/server.php?p=smpnJbtn', {IdJbtn:IdJbtn, NmJbtn:NmJbtn, Gapok:Gapok, Level, TunjanganJbtn}, function(data){
		tmplJbtn()
		$('#IdJbtn').val('')
		$('#NmJbtn').val('')
		$('#Gapok').val('')
		$('#TunjanganJbtn').val()
		alert('Data berhasil ditambahkan')
	})
	}else{
		alert('Masih Ada textbox yang kosong')
	}
}

//=============================================
//Edit data Jabatan
//=============================================

function editJbtn(IdJbtn, NmJbtn, Gapok, Level, TunjanganJbtn){
	$('#IdJbtn').val(IdJbtn)
	$('#NmJbtn').val(NmJbtn)
	$('#Gapok').val(Gapok)
	$('#Level').val(Level)
	$('#TunjanganJbtn').val(TunjanganJbtn)
	$('#smpnjbtn').prop("disabled",true);
	$('#perbaruijbtn').prop("disabled",false);

}

//=============================================
//Perbarui data Jabatan
//=============================================

function perbaruiJbtn(){
	var IdJbtn = $('#IdJbtn').val()
	var NmJbtn = $('#NmJbtn').val()
	var Gapok = $('#Gapok').val()
	var Level = $('#Level').val()
	var TunjanganJbtn = $('#TunjanganJbtn').val()
	$.post('../../config/server.php?p=perbaruiJbtn',{IdJbtn:IdJbtn, NmJbtn:NmJbtn, Gapok:Gapok, Level:Level, TunjanganJbtn:TunjanganJbtn}, function(data){
		tmplJbtn()
		$('#IdJbtn').val('')
		$('#NmJbtn').val('')
		$('#Gapok').val('')
		$('#TunjanganJbtn').val()
		$('#smpnjbtn').prop('disabled',false);
		$('#perbaruijbtn').prop('disabled',true);
		alert('Data berhasil diubah')
	})
}

//=============================================
//Hapus data Jabatan
//=============================================

function hpsJbtn(IdJbtn){
	$.post('../../config/server.php?p=hpsJbtn',{IdJbtn}, function(data){
		tmplJbtn()
		alert('Data berhasil dihapus')
	})
}

//=============================================
//Validasi data Jabatan
//=============================================

function vldsconJbtn(IdJbtn){
	var conJbtn = confirm('Apakah anda yakin menghapus data ini ?');
	if(conJbtn=='1'){
		hpsJbtn(IdJbtn);
	}
}

//=============================================
//Reset data Jabatan
//=============================================

function resetJbtn(){
	$('#smpnjbtn').prop('disabled',false);
	$('#perbaruijbtn').prop('disabled',true);
}


//====================================================================================================================================

//=============================================
//Tampil User
//=============================================
$('table').dataTable();
$('#perbaruiuser').prop("disabled",true);
function tmplUser(){
	$.get('../../config/server.php?p=tmplUser', function(data){
		$('tbody').html(data)
	})
}

//=============================================
//Simpan data User
//=============================================

function smpnUser(){
	var Id_User = $('#Id_User').val()
	var Uname = $('#Uname').val()
	var Pass = $('#Pass').val()
	var Lvl = $('#Lvl').val()
	if(Uname && Pass && Lvl != ''){
	$.post('../../config/server.php?p=smpnUser', {Id_User:Id_User, Uname:Uname, Pass:Pass, Lvl:Lvl}, function(data){
		tmplUser()
		$('#Id_User').val('')
		$('#Uname').val('')
		$('#Pass').val('')
		alert('Data berhasil ditambahkan')
	})
	}else{
		alert('Masih Ada textbox yang kosong')
	}
}

//=============================================
//Edit data User
//=============================================

function editUser(Id_User, Uname, Pass, Lvl){
	$('#Id_User').val(Id_User)
	$('#Uname').val(Uname)
	$('#Pass').val(Pass)
	$('#Lvl').val(Lvl)
	$('#smpnuser').prop("disabled",true);
	$('#perbaruiuser').prop("disabled",false);

}

//=============================================
//Perbarui data User
//=============================================

function perbaruiUser(){
	var Id_User = $('#Id_User').val()
	var Uname = $('#Uname').val()
	var Pass = $('#Pass').val()
	var Lvl = $('#Lvl').val()
	$.post('../../config/server.php?p=perbaruiUser',{Id_User:Id_User, Uname:Uname, Pass:Pass, Lvl:Lvl}, function(data){
		tmplUser()
		$('#Id_User').val('')
		$('#Uname').val('')
		$('#Pass').val('')
		$('#smpnuser').prop('disabled',false);
		$('#perbaruiuser').prop('disabled',true);
		alert('Data berhasil diubah')
	})
}

//=============================================
//Hapus data User
//=============================================

function hpsUser(Id_User){
	$.post('../../config/server.php?p=hpsUser',{Id_User}, function(data){
		tmplUser()
		alert('Data berhasil dihapus')
	})
}

//=============================================
//Validasi data User
//=============================================

function vldsconUser(Id_User){
	var conUser = confirm('Apakah anda yakin menghapus data ini ?');
	if(conUser=='1'){
		hpsUser(Id_User);
	}
}

//=============================================
//Reset data User
//=============================================

function resetUser(){
	$('#smpnuser').prop('disabled',false);
	$('#perbaruiuser').prop('disabled',true);
}

//====================================================================================================================================

//=============================================
//Tampil User
//=============================================
$('table').dataTable();
$('#perbaruiuser').prop("disabled",true);
function tmplUserM(){
	$.get('../../config/server.php?p=tmplUserM', function(data){
		$('tbody').html(data)
	})
}

//=============================================
//Simpan data User
//=============================================

function smpnUserM(){
	var Id_User = $('#Id_User').val()
	var Uname = $('#Uname').val()
	var Pass = $('#Pass').val()
	var Lvl = $('#Lvl').val()
	if(Uname && Pass && Lvl != ''){
	$.post('../../config/server.php?p=smpnUser', {Id_User:Id_User, Uname:Uname, Pass:Pass, Lvl:Lvl}, function(data){
		tmplUserM()
		$('#Id_User').val('')
		$('#Uname').val('')
		$('#Pass').val('')
		alert('Data berhasil ditambahkan')
	})
	}else{
		alert('Masih Ada textbox yang kosong')
	}
}

//=============================================
//Edit data User
//=============================================

function editUserM(Id_User, Uname, Pass, Lvl){
	$('#Id_User').val(Id_User)
	$('#Uname').val(Uname)
	$('#Pass').val(Pass)
	$('#Lvl').val(Lvl)
	$('#smpnuser').prop("disabled",true);
	$('#perbaruiuser').prop("disabled",false);

}

//=============================================
//Perbarui data User
//=============================================

function perbaruiUserM(){
	var Id_User = $('#Id_User').val()
	var Uname = $('#Uname').val()
	var Pass = $('#Pass').val()
	var Lvl = $('#Lvl').val()
	$.post('../../config/server.php?p=perbaruiUser',{Id_User:Id_User, Uname:Uname, Pass:Pass, Lvl:Lvl}, function(data){
		tmplUserM()
		$('#Id_User').val('')
		$('#Uname').val('')
		$('#Pass').val('')
		$('#smpnuser').prop('disabled',false);
		$('#perbaruiuser').prop('disabled',true);
		alert('Data berhasil diubah')
	})
}

//=============================================
//Hapus data User
//=============================================

function hpsUserM(Id_User){
	$.post('../../config/server.php?p=hpsUser',{Id_User}, function(data){
		tmplUserM()
		alert('Data berhasil dihapus')
	})
}

//=============================================
//Validasi data User
//=============================================

function vldsconUserM(Id_User){
	var conUser = confirm('Apakah anda yakin menghapus data ini ?');
	if(conUser=='1'){
		hpsUser(Id_User);
	}
}

//=============================================
//Reset data User
//=============================================

function resetUserM(){
	$('#smpnuser').prop('disabled',false);
	$('#perbaruiuser').prop('disabled',true);
}


//====================================================================================================================================

//=============================================
//Tampil Profil Pegawai
//=============================================
$('table').dataTable();
$('#perbaruiprofpeg').prop("disabled",true);
function tmplProfPeg(){
	$.get('../../config/server.php?p=tmplProfPeg', function(data){
		$('tbody').html(data)
	})
}

//=============================================
//Simpan data Profil Pegawai
//=============================================

function smpnProfPeg(){
	var NoPeg = $('#NoPeg').val()
	var NmPeg = $('#NmPeg').val()
	var TglGabung = $('#TglGabung').val()
	var Id_User = $('#Id_User1').val()
	if(NoPeg && NmPeg && TglGabung  && Id_User != ''){
	$.post('../../config/server.php?p=smpnProfPeg', {NoPeg:NoPeg, NmPeg:NmPeg, TglGabung:TglGabung, Id_User:Id_User}, function(data){
		tmplProfPeg()
		$('#NoPeg').val('')
		$('#NmPeg').val('')
		$('#TglGabung').val('')
		$('#Id_User1').val('')
	})
	}else{
		alert('Masih Ada textbox yang kosong')
	}
}

//=============================================
//Edit data Profil Pegawai
//=============================================

function editProfPeg(NoPeg, NmPeg, TglGabung, Id_User){
	$('#NoPeg').val(NoPeg)
	$('#NmPeg').val(NmPeg)
	$('#TglGabung').val(TglGabung)
	$('#Id_User1').val(Id_User)
	$('#smpnprofpeg').prop("disabled",true);
	$('#perbaruiprofpeg').prop("disabled",false);

}

//=============================================
//Perbarui data Profil Pegawai
//=============================================

function perbaruiProfPeg(){
	var NoPeg = $('#NoPeg').val()
	var NmPeg = $('#NmPeg').val()
	var TglGabung = $('#TglGabung').val()
	var Id_User = $('#Id_User1').val()
	$.post('../../config/server.php?p=perbaruiProfPeg',{NoPeg:NoPeg, NmPeg:NmPeg, TglGabung:TglGabung, Id_User:Id_User}, function(data){
		tmplProfPeg()
		$('#NoPeg').val('')
		$('#NmPeg').val('')
		$('#TglGabung').val('')
		$('#Id_User1').val('')
		$('#smpnprofpeg').prop('disabled',false);
		$('#perbaruiprofpeg').prop('disabled',true);
		alert('Data berhasil diubah')
	})
}

//=============================================
//Hapus data Profil Pegawai
//=============================================

function hpsProfPeg(NoPeg){
	$.post('../../config/server.php?p=hpsProfPeg',{NoPeg}, function(data){
		tmplProfPeg()
		alert('Data berhasil dihapus')
	})
}

//=============================================
//Validasi data Profil Pegawai
//=============================================

function vldsconProfPeg(NoPeg){
	var conProfPeg = confirm('Apakah anda yakin menghapus data ini ?');
	if(conProfPeg=='1'){
		hpsProfPeg(NoPeg);
	}
}

//=============================================
//Reset data Profil Pegawai
//=============================================

function resetProfPeg(){
	$('#smpnprofpeg').prop('disabled',false);
	$('#perbaruiprofpeg').prop('disabled',true);
}

//===================================================================================================================================

//=============================================
//Tampil Biografi Pegawai
//=============================================
$('table').dataTable();
$('#perbaruibiopeg').prop("disabled",true);
function tmplBioPeg(){
	$.get('../../config/server.php?p=tmplBioPeg', function(data){
		$('tbody').html(data)
	})
}

//=============================================
//Edit data Biografi Pegawai
//=============================================

function editBioPeg(NoPeg2, TmptLhr, TglLhr, Gndr, Almt, NoTelp, Agm, StsNkh, JmlhAnak, AnakNikah, Kewarganegaraan, Jbtn, PndAkr, Email, GolDar, ContDar, NoKTP,NoKK){
	document.BioPeg.NoPeg2.disabled=false;
	document.BioPeg.TmptLhr.disabled=false;
	document.BioPeg.TglLhr.disabled=false;
	document.BioPeg.Gndr.disabled=false;
	document.BioPeg.Almt.disabled=false;
	document.BioPeg.NoTelp.disabled=false;
	document.BioPeg.Agm.disabled=false;
	document.BioPeg.StsNkh.disabled=false;
	document.BioPeg.JmlhAnak.disabled=false;
	document.BioPeg.AnakNikah.disabled=false;
	document.BioPeg.Kewarganegaraan.disabled=false;
	document.BioPeg.Jbtn.disabled=false;
	document.BioPeg.PndAkr.disabled=false;
	document.BioPeg.Email.disabled=false;
	document.BioPeg.GolDar.disabled=false;
	document.BioPeg.ContDar.disabled=false;
	document.BioPeg.NoKTP.disabled=false;
	document.BioPeg.NoKK.disabled=false;
	$('#NoPeg2').val(NoPeg2)
	$('#TmptLhr').val(TmptLhr)
	$('#TglLhr').val(TglLhr)
	$('#Gndr').val(Gndr)
	$('#Almt').val(Almt)
	$('#NoTelp').val(NoTelp)
	$('#Agm').val(Agm)
	$('#StsNkh').val(StsNkh)
	$('#JmlhAnak').val(JmlhAnak)
	$('#AnakNikah').val(AnakNikah)
	$('#Kewarganegaraan').val(Kewarganegaraan)
	$('#Jbtn').val(Jbtn)
	$('#PndAkr').val(PndAkr)
	$('#Email').val(Email)
	$('#GolDar').val(GolDar)
	$('#ContDar').val(ContDar)
	$('#NoKTP').val(NoKTP)
	$('#NoKK').val(NoKK)
	$('#perbaruibiopeg').prop("disabled",false);
}

//=============================================
//Perbarui data Biografi pegawai
//=============================================

function perbaruiBioPeg(){
	var NoPeg2 = $('#NoPeg2').val()
	var TmptLhr = $('#TmptLhr').val()
	var TglLhr = $('#TglLhr').val()
	var Gndr = $('#Gndr').val()
	var Almt = $('#Almt').val()
	var NoTelp = $('#NoTelp').val()
	var Agm = $('#Agm').val()
	var StsNkh = $('#StsNkh').val()
	var JmlhAnak = $('#JmlhAnak').val()
	var AnakNikah = $('#AnakNikah').val()
	var Kewarganegaraan = $('#Kewarganegaraan').val()
	var Jbtn = $('#Jbtn').val()
	var PndAkr = $('#PndAkr').val()
	var Email = $('#Email').val()
	var GolDar = $('#GolDar').val()
	var ContDar = $('#ContDar').val()
	var NoKTP = $('#NoKTP').val()
	var NoKK = $('#NoKK').val()
	$.post('../../config/server.php?p=perbaruiBioPeg',{NoPeg2:NoPeg2, TmptLhr:TmptLhr, TglLhr:TglLhr, Gndr:Gndr, Almt:Almt, NoTelp:NoTelp, Agm:Agm, StsNkh:StsNkh, JmlhAnak:JmlhAnak, AnakNikah:AnakNikah, Kewarganegaraan:Kewarganegaraan, Jbtn:Jbtn, PndAkr:PndAkr, Email:Email, GolDar:GolDar, ContDar:ContDar, NoKTP:NoKTP, NoKK:NoKK}, function(data){
		tmplBioPeg()
		$('#NoPeg2').val('')
		$('#TmptLhr').val('')
		$('#TglLhr').val('')
		$('#Gndr').val('')
		$('#Almt').val('')
		$('#NoTelp').val('')
		$('#Agm').val('')
		$('#StsNkh').val('')
		$('#JmlhAnak').val('')
		$('#AnakNikah').val('')
		$('#Kewarganegaraan').val('')
		$('#Jbtn').val('')
		$('#PndAkr').val('')
		$('#Email').val('')
		$('#GolDar').val('')
		$('#ContDar').val('')
		$('#NoKTP').val('')
		$('#NoKK').val('')
		$('#perbaruibiopeg').prop("disabled",true);
		enabledisabletext();
		alert('Data berhasil diubah')
	})
}

//=============================================
//Hapus data Biografi Pegawai
//=============================================

function bersihkanBioPeg(NoPeg){
	$.post('../../config/server.php?p=brshBioPeg',{NoPeg}, function(data){
		$('#NoPeg2').val('')
		$('#TmptLhr').val('')
		$('#TglLhr').val('')
		$('#Almt').val('')
		$('#NoTelp').val('')
		$('#Agm').val('')
		$('#JmlhAnak').val('')
		$('#AnakNikah').val('')
		$('#Kewarganegaraan').val('')
		$('#Jbtn').val('')
		$('#PndAkr').val('')
		$('#Email').val('')
		$('#ContDar').val('')
		$('#NoKTP').val('')
		$('#NoKK').val('')
		tmplBioPeg()
		enabledisabletext();
		$('#perbaruibiopeg').prop("disabled",true);
		alert('Data berhasil dihapus')

	})
}

//=============================================
//Validasi data Biografi Pegawai
//=============================================

function vldsconBioPeg(NoPeg){
	var conBioPeg = confirm('Apakah anda yakin menghapus data ini ?');
	if(conBioPeg=='1'){
		bersihkanBioPeg(NoPeg);
	}
}

//=============================================
//Reset data Biografi Pegawai
//=============================================

function resetBioPeg(){
	$('#perbaruibiopeg').prop('disabled',true);
	enabledisabletext();
}


//====================================================================================================================================

//=============================================
//Tampil Absensi Pegawai
//=============================================
$('table').dataTable();
$('#perbaruiabspeg').prop("disabled",true);
function tmplAbsPeg(){
	$.get('../../config/server.php?p=tmplAbsPeg', function(data){
		$('tbody').html(data)
	})
}

//=============================================
//Simpan data Absensi Pegawai
//=============================================

function smpnAbsPeg(){
	var NoPeg4 = $('#NoPeg4').val()
	var Hdr = $('#Hdr').val()
	var Alf = $('#Alf').val()
	var Skt = $('#Skt').val()
	var Izn = $('#Izn').val()
	var Terlambat = $('#Terlambat').val()
	var OverTime = $('#OverTime').val()
	var Bln = $('#Bulan1').val()
	var Thn = $('#Tahun1').val()
	if(NoPeg4 && Hdr && Alf && Skt && Izn && Terlambat && OverTime && Bln && Thn != ''){
	$.post('../../config/server.php?p=smpnAbsPeg', {NoPeg4:NoPeg4, Hdr:Hdr, Alf:Alf, Skt:Skt, Izn:Izn, Terlambat:Terlambat, OverTime:OverTime, Bln:Bln, Thn:Thn}, function(data){
		tmplAbsPeg()
		$('#NoPeg4').val('')
		$('#Hdr').val('')
		$('#Alf').val('')
		$('#Skt').val('')
		$('#Izn').val('')
		$('#Terlambat').val('')
		$('#OverTime').val('')
		$('#Bulan1').val('')
		$('#Tahun1').val('')
		alert('Data berhasil ditambahkan')
	})
	}else{
		alert('Masih Ada textbox yang kosong')
	}
}

//=============================================
//Edit data Absensi Pegawai
//=============================================

function editAbsPeg(NoPeg4, Hdr, Alf, Skt, Izn, Terlambat, OverTime, Bln, Thn){
	document.getElementById("NoPeg4").disabled=true;
	document.getElementById('Bulan1').disabled=true;
	document.getElementById('Tahun1').disabled=true;
	$('#NoPeg4').val(NoPeg4)
	$('#NoPeg4Hid').val(NoPeg4)
	$('#Hdr').val(Hdr)
	$('#Alf').val(Alf)
	$('#Skt').val(Skt)
	$('#Izn').val(Izn)
	$('#Terlambat').val(Terlambat)
	$('#OverTime').val(OverTime)
	$('#Bulan1').val(Bln)
	$('#Tahun1').val(Thn)
	$('#smpnabspeg').prop("disabled",true);
	$('#perbaruiabspeg').prop("disabled",false);
}

//=============================================
//Perbarui data Absensi Pegawai
//=============================================

function perbaruiAbsPeg(){
	var NoPeg4 = $('#NoPeg4Hid').val()
	var Hdr = $('#Hdr').val()
	var Alf = $('#Alf').val()
	var Skt = $('#Skt').val()
	var Izn = $('#Izn').val()
	var Terlambat = $('#Terlambat').val()
	var OverTime = $('#OverTime').val()
	var Bln = $('#Bulan1').val()
	var Thn = $('#Tahun1').val()
	$.post('../../config/server.php?p=perbaruiAbsPeg',{NoPeg4:NoPeg4, Hdr:Hdr, Alf:Alf, Skt:Skt, Izn:Izn, Terlambat:Terlambat, OverTime:OverTime, Bln:Bln, Thn:Thn}, function(data){
		tmplAbsPeg()
		enabledisableAbs()
		$('#NoPeg4').val('')
		$('#Hdr').val('')
		$('#Alf').val('')
		$('#Skt').val('')
		$('#Izn').val('')
		$('#Terlambat').val('')
		$('#OverTime').val('')
		$('#Bulan1').val('')
		$('#Tahun1').val('')
		$('#smpnabspeg').prop("disabled",false);
		$('#perbaruiabspeg').prop("disabled",true);
		alert('Data berhasil diubah')
	})
}

//=============================================
//Hapus data Absensi Pegawai
//=============================================

function hpsAbsPeg(IdAbs, NoPeg, Bln, Thn){
	$.post('../../config/server.php?p=hpsAbsPeg',{IdAbs, NoPeg, Bln, Thn}, function(data){
		tmplAbsPeg()
		alert('Data berhasil dihapus')
	})
}

//=============================================
//Validasi data Absensi Pegawai
//=============================================

function vldsconAbsPeg(IdAbs, NoPeg, Bln, Thn){
	var conAbsPeg = confirm('Apakah anda yakin menghapus data ini ?');
	if(conAbsPeg=='1'){
		hpsAbsPeg(IdAbs, NoPeg, Bln, Thn);
	}
}

//=============================================
//Reset data Absensi
//=============================================

function resetAbsPeg(){
	enabledisableAbs()
	$('#smpnabspeg').prop('disabled',false);
	$('#perbaruiabspeg').prop('disabled',true);
}



//===================================================================================================================================

//=============================================
//Tampil Gaji Pegawai
//=============================================
$('table').dataTable();
$('#perbaruigajipeg').prop("disabled",true);
function tmplGajiPeg(){
	$.get('../../config/server.php?p=tmplGajiPeg', function(data){
		$('tbody').html(data)
	})
}

//=============================================
//Simpan data Gaji Pegawai
//=============================================
function smpnGajiPeg(){
	var NoPeg3 = $('#NoPeg3').val()
	var Bulan = $('#Bulan').val()
	var Tahun = $('#Tahun').val()
	var TunjanganJbtn = $('#TunjanganJbtn1').val()
	var TunjanganPerumahan = $('#TunjanganPerumahan').val()
	var TunjanganTransport = $('#TunjanganTransport').val()
	var TunjanganIstri = $('#TunjanganIstri').val()
	var TunjanganAnak = $('#TunjanganAnak').val()
	var TunjanganKebijakan = $('#TunjanganKebijakan').val()
	var THR = $('#THR').val()
	var Cash = $('#Cash').val()
	var PotIuranJamsostek = $('#PotIuranJamsostek').val()
	var PotIuranBPJS = $('#PotIuranJamsostek').val()
	var PotIuranKop = $('#PotIuranKop').val()
	var DendaLambat = $('#DendaLambat').val()
	var DendaKetidakhadiran = $('#DendaKetidakhadiran').val()
	var PotMinCuti = $('#PotMinCuti').val()
	if(NoPeg3 && Bulan && Tahun &&  TunjanganPerumahan && TunjanganTransport && TunjanganIstri && TunjanganKebijakan && THR && Cash && PotIuranJamsostek && PotIuranBPJS && PotIuranKop && PotMinCuti != ''){
	$.post('../../config/server.php?p=smpnGajiPeg',{NoPeg3:NoPeg3, Bulan:Bulan, Tahun:Tahun, TunjanganJbtn:TunjanganJbtn, TunjanganPerumahan:TunjanganPerumahan, TunjanganTransport:TunjanganTransport, TunjanganIstri:TunjanganIstri, TunjanganAnak:TunjanganAnak, TunjanganKebijakan:TunjanganKebijakan, THR:THR, Cash:Cash, PotIuranJamsostek:PotIuranJamsostek, PotIuranBPJS:PotIuranBPJS, PotIuranKop:PotIuranKop, DendaLambat:DendaLambat, DendaKetidakhadiran:DendaKetidakhadiran, PotMinCuti:PotMinCuti}, function(data){
		tmplGajiPeg()
		$('#NoPeg3').val('')
		$('#Bulan').val('')
		$('#Tahun').val('')
		$('#TunjanganJbtn1').val('')
		$('#TunjanganPerumahan').val('')
		$('#TunjanganTransport').val('')
		$('#TunjanganIstri').val('')
		$('#TunjanganAnak').val('')
		$('#TunjanganKebijakan').val('')
		$('#THR').val('')
		$('#Cash').val('')
		$('#PotIuranJamsostek').val('')
		$('#PotIuranBPJS').val('')
		$('#PotIuranKop').val('')
		$('#DendaLambat').val('')
		$('#DendaKetidakhadiran').val('')
		$('#PotMinCuti').val('')
		alert('Data berhasil ditambahkan')
	})
	}else{
		alert('Masih ada data yang kosong')
	}
}

//=============================================
//Edit data Gaji Pegawai
//=============================================

function editGajiPeg(NoPeg3, Bulan, Tahun, TunjanganJbtn, TunjanganPerumahan, TunjanganTransport, TunjanganIstri, TunjanganAnak, TunjanganKebijakan, THR, Cash, PotIuranJamsostek, PotIuranBPJS, PotIuranKop, DendaLambat, DendaKetidakhadiran, PotMinCuti){
	document.Tunjangan.NoPeg3.disabled=true;
	document.Tunjangan.Bulan.disabled=true;
	document.Tunjangan.Tahun.disabled=true;
	$('#NoPeg3').val(NoPeg3)
	$('#Bulan').val(Bulan)
	$('#Tahun').val(Tahun)
	$('#TunjanganJbtn1').val(TunjanganJbtn)
	$('#TunjanganPerumahan').val(TunjanganPerumahan)
	$('#TunjanganTransport').val(TunjanganTransport)
	$('#TunjanganIstri').val(TunjanganIstri)
	$('#TunjanganAnak').val(TunjanganAnak)
	$('#TunjanganKebijakan').val(TunjanganKebijakan)
	$('#THR').val(THR)
	$('#Cash').val(Cash)
	$('#PotIuranJamsostek').val(PotIuranJamsostek)
	$('#PotIuranBPJS').val(PotIuranBPJS)
	$('#PotIuranKop').val(PotIuranKop)
	$('#DendaLambat').val(DendaLambat)
	$('#DendaKetidakhadiran').val(DendaKetidakhadiran)
	$('#PotMinCuti').val(PotMinCuti)
	$('#smpngajipeg').prop("disabled",true);
	$('#perbaruigajipeg').prop("disabled",false);
}

//=============================================
//Perbarui data Gaji pegawai
//=============================================

function perbaruiGajiPeg(){
	var NoPeg3 = $('#NoPeg3').val()
	var TunjanganJbtn = $('#TunjanganJbtn1').val()
	var TunjanganPerumahan = $('#TunjanganPerumahan').val()
	var TunjanganTransport = $('#TunjanganTransport').val()
	var TunjanganIstri = $('#TunjanganIstri').val()
	var TunjanganAnak = $('#TunjanganAnak').val()
	var TunjanganKebijakan = $('#TunjanganKebijakan').val()
	var THR = $('#THR').val()
	var Cash = $('#Cash').val()
	var PotIuranJamsostek = $('#PotIuranJamsostek').val()
	var PotIuranBPJS = $('#PotIuranJamsostek').val()
	var PotIuranKop = $('#PotIuranKop').val()
	var DendaLambat = $('#DendaLambat').val()
	var DendaKetidakhadiran = $('#DendaKetidakhadiran').val()
	var PotMinCuti = $('#PotMinCuti').val()
	$.post('../../config/server.php?p=perbaruiGajiPeg',{NoPeg3:NoPeg3, TunjanganJbtn:TunjanganJbtn, TunjanganPerumahan:TunjanganPerumahan, TunjanganTransport:TunjanganTransport, TunjanganIstri:TunjanganIstri, TunjanganAnak:TunjanganAnak, TunjanganKebijakan:TunjanganKebijakan, THR:THR, Cash:Cash, PotIuranJamsostek:PotIuranJamsostek, PotIuranBPJS:PotIuranBPJS, PotIuranKop:PotIuranKop, DendaLambat:DendaLambat, DendaKetidakhadiran:DendaKetidakhadiran, PotMinCuti:PotMinCuti}, function(data){
		tmplGajiPeg()
		$('#NoPeg3').val('')
		$('#Bulan').val('')
		$('#Tahun').val('')
		$('#TunjanganJbtn1').val('')
		$('#TunjanganPerumahan').val('')
		$('#TunjanganTransport').val('')
		$('#TunjanganIstri').val('')
		$('#TunjanganAnak').val('')
		$('#TunjanganKebijakan').val('')
		$('#THR').val('')
		$('#Cash').val('')
		$('#PotIuranJamsostek').val('')
		$('#PotIuranBPJS').val('')
		$('#PotIuranKop').val('')
		$('#DendaLambat').val('')
		$('#DendaKetidakhadiran').val('')
		$('#PotMinCuti').val('')
		$('#smpngajipeg').prop('disabled',false);
		$('#perbaruigajipeg').prop("disabled",true);
		enadistunj();
		alert('Data berhasil diubah')
	})
}

//=============================================
//Hapus data Gaji Pegawai
//=============================================

function hapusGajiPeg(IdGaji){
	$.post('../../config/server.php?p=hapusGajiPeg',{IdGaji}, function(data){
		tmplGajiPeg()
		alert('Data berhasil dihapus')

	})
}

//=============================================
//Validasi data Gaji Pegawai
//=============================================

function vldsconGajiPeg(IdGaji){
	var conGajiPeg = confirm('Apakah anda yakin menghapus data ini ?');
	if(conGajiPeg=='1'){
		hapusGajiPeg(IdGaji);
	}
}

//=============================================
//Reset data Gaji Pegawai
//=============================================

function resetGajiPeg(){
	$('#smpngajipeg').prop('disabled',false);
	$('#perbaruigajipeg').prop('disabled',true);
	enadistunj();
}

//================================================================================

//=============================================
//Tampil Filter Gaji
//=============================================
$('table').dataTable();
function tmplFilGaji(){
	$.get('../../config/server.php?p=tmplFilGaji', function(data){
		$('tbody').html(data)
	})
}


//=============================================
//Waktu
//=============================================
$(document).ready(function(){
	setInterval(function(){
		var waktu = new Date();
		var jam = waktu.getHours()<10 ? "0"+waktu.getHours():waktu.getHours();
		var menit = waktu.getMinutes()<10 ? "0"+waktu.getMinutes():waktu.getMinutes();
		var detik = waktu.getSeconds()<10 ? "0"+waktu.getSeconds():waktu.getSeconds();
		$('.jam').text('Waktu : '+jam+':'+menit+':'+detik);
	},1000);
	var waktu = new Date();
	var namaBulan = new Array('1','2','3','4','5','6','7','8','9','10','11','12');
	var tanggal = waktu.getDate();
	var bulan = namaBulan[waktu.getMonth()];
	var tahun = waktu.getFullYear();
	$('.tanggal').text('Tanggal : '+tanggal+'-'+bulan+'-'+tahun);
});

//=============================================
//Saring Table
//=============================================

$(document).ready(function(){
	$('.saring').keyup(function(){
		var text = $(this).val();

		if(text != '') $('td').parent().hide();
		else $('td').parent().show();

		$('td').filter(function(){
			return $(this).text().indexOf(text) !== -1;
		}).parent().show();
	});
});


$(document).ready(function(){
	function online(){
		$(".useronline").load("online.php");
	}setInterval(online,1000);
})



//==========================================================
// Side Bar
//==========================================================
$(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();
    });

    function hamburger_cross() {

      if (isClosed == true) {
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }

  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });
});
