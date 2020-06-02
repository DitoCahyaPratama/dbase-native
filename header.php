 <?php
	session_start();
	if (!isset($_SESSION['username'])){
		$username = '';
		session_start();
		session_destroy();
		header('location:login.php');
	}else {
		$Id_User = $_GET['Id_User'];
		$Uname = $_GET['Uname'];
		$click = $_GET['click'];
		$AmblLvl = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_user WHERE Id_User='$Id_User' AND Uname='$Uname'"));
		$Lvl = $AmblLvl['Lvl'];
	}
 ?>
<nav class="navbar navbar-default navbar-fixed-top" style="background-color: #001529;">
	<div class="container-fluid">		
				<?php
						if($click == 'tambah_data' || $click == 'edit_aplikasi' || $click == 'user_online' || $click == 'inv-peg' || $click == 'sal-peg'){
							?>
							<div class="navbar-header">
								<div class="form-group">
									<div class="tanggal" style="font-size: 20px; font-family: Rockwell; color:#fff; margin-left:100px;"></div>
									<div class="jam" style="font-size: 20px; font-family: Rockwell; color:#fff; margin-left:100px;"></div>
								</div>
							</div>
							<div class="navbar-header navbar-right">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<img src="..\..\images\DBase_Logo.png" class="navbar-brand">
							</div>
							<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
								<div id="page-content-wrapper" style="padding:0;">
           					 		<button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                							<span class="hamb-top" style="background: white;"></span>
    										<span class="hamb-middle" style="background: white;"></span>
											<span class="hamb-bottom" style="background: white;"></span>
            						</button>
        						</div>
							</div>
						<?php }else if($click == 'abs-peg')
						{ ?>
							<div class="navbar-header">
								<ul class="nav navbar-nav">	
									<li><a href="../../index.php?Id_User=<?php echo $Id_User; ?>&Uname=<?php echo $Uname; ?>&click=o"><span class="fa fa-arrow-left"></span> Kembali <span class="sr-only">(current)</span></a></li>
								</ul>
								<div class="form-group">
									<div class="tanggal" style="font-size: 20px; font-family: Rockwell; color:#fff; margin-left:300px;"></div>
									<div class="jam" style="font-size: 20px; font-family: Rockwell; color:#fff; margin-left:300px;"></div>
								</div>
							</div>
							<div class="navbar-header navbar-right">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<img src="..\..\images\DBase_Logo.png" class="navbar-brand">
							</div>
						<?php
						}else if($click == 'o'){
						?>
								<div class="navbar-header navbar-right">
									<div class="form-group">
										<div class="tanggal" style="font-size: 20px; font-family: Rockwell; color:#fff; margin-left:100px;"></div>
										<div class="jam" style="font-size: 20px; font-family: Rockwell; color:#fff; margin-left:100px;"></div>
									</div>
								</div>
								<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
									<img src="images\DBase_Logo.png" class="navbar-brand">
								</div>
								<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
									<ul class="nav navbar-nav">
										<li><a style='color:white;'><?php echo $Uname; ?></a></li>
									</ul>
									<ul class="nav navbar-nav navbar-right">
										<li><a onclick="document.getElementById('id02').style.display='block'" data-toggle="collapse" data-target="#bs-navbar-collapse-1"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
									</ul>
								</div>
								<?php
						}else if($click == 'entri_jurnal_peg' || $click == 'tentang'){
								?>
								<div class="navbar-header navbar-right">
									<div class="form-group">
										<div class="tanggal" style="font-size: 18px; font-family: Rockwell; color:#fff; margin-left:100px;"></div>
										<div class="jam" style="font-size: 18px; font-family: Rockwell; color:#fff; margin-left:100px;"></div>
									</div>
								</div>
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<img src="images\DBase_Logo.png" class="navbar-brand">
							</div>
							<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
								<ul class="nav navbar-nav">	
									<li><a href="index.php?Id_User=<?php echo $Id_User; ?>&Uname=<?php echo $Uname; ?>&click=o"><span class="fa fa-arrow-left"></span> Kembali <span class="sr-only">(current)</span></a></li>
								</ul>
							</div>
								<?php
						}else if($click == 'chat' || $click == 'komentar' || $click == 'chatadmin'){
							?>
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<img src="..\..\images\DBase_Logo.png" class="navbar-brand">
							</div>
							<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
								<ul class="nav navbar-nav">	
									<li><a href="..\..\index.php?Id_User=<?php echo $Id_User; ?>&Uname=<?php echo $Uname; ?>&click=o"><span class="fa fa-arrow-left"></span> Kembali <span class="sr-only">(current)</span></a></li>
								</ul>
							</div>
								<?php
							}else{

							}
					?>				
		</div><!-- /.navbar-collapse -->
	</div>
</nav>
</br>
</br>
</br>