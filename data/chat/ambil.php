<?php
	include "../../config/koneksi.php";
	$ambil = mysqli_query($dbcon,"SELECT * FROM pesan ORDER BY id");
	while($ulangi = mysqli_fetch_array($ambil)){
		echo "<p>
				<span class='label label-info text-center'>
					<i class='icon-user icon-white'></i>
						".$ulangi['nick']."
				</span>
				<small>&nbsp;".$ulangi['pesan']."</small>
				<small class='muted'>(".$ulangi['waktu'].")</small>
			  </p>";
	}
?>