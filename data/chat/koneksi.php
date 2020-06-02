<?php
try{
	$koneksi=new PDO('mysql:host=localhost;dbname=db_dbase_r','root','');	
}catch(PDOException $e){
	echo "Koneksi Database gagal ".$e->getMessage();
	exit;
}
?>