<?php
	//waktu pertama kali kenal
	$nama_cinta = 'IQFI MALIDATUL KHOMSA';
	$cinta = mysqli_query($koneksi,'INSERT INTO hati (nama_cinta) VALUES ('$nama_cinta')');
	if($cinta){
		echo"jaga hati ini untuk selamanya";
	}else{
		echo"ingatlah masih ada akhirat";
	}
?>