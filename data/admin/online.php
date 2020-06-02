<?php
	include "../../config/koneksi.php";
	$ambil = mysqli_query($dbcon,"SELECT * FROM online ORDER BY id DESC");
	while($list=mysqli_fetch_array($ambil)){
		echo "<i class='icon-user'></i>
				<span class=''label label-info'>"
					.$list['nick'].
				"</span>
				<span class='label'>".substr($list['waktu'],0,5)."</span></br>";
	}
?>