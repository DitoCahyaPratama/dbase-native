<!DOCTYPE html>
<html>
<head>
	<title>Komentar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../assets\css\bootstrap.min.css">
	<link rel="icon" type="image/jpeg" href="../../images/Icon_DBase.jpg">
	<link rel="stylesheet" type="text/css" href="../../style/style.css">
	<link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.min.css">
	<link href="../../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
  	<script src="../../script/jquery-3.2.1.min.js"></script>
  	<script src="../../assets\js\bootstrap.min.js"></script>
  	<script src="../../assets/js/jquery.dataTables.min.js"></script>
  	<script src="../../assets/js/dataTables.bootstrap.min.js"></script>
</head>
	<script>
  		//=============================================
		//Tampil Komentar
		//=============================================
		$('table').dataTable();
		tmplKom();
		function tmplKom(){
			$.get('../../config/server.php?p=tmplKom', function(data){
				$('tbody').html(data)
			})
		}
  	</script>
<body style="background: #ffffff;">

	<?php
		include '../../config/koneksi.php';
		include '../../header.php';
		include '../../footer.php';
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 table-responsive">
				<table class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Pengirim</th>
							<th>Komentar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						
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
						
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="../../script/script.js"></script>
</body>
</html>
