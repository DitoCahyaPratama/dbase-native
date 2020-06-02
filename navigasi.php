<?php
    $Uname = $_GET['Uname'];
    $Id_User = $_GET['Id_User'];
    $click = $_GET['click'];
?>
    <div id="wrapper">
        <div class="overlay"></div>
        <?php if($Id_User == 1) { ?>
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <img src="..\..\images\DBase_Logo.png" class="navbar-brand">
                </li>
                <li>
                    <a href="../../index.php?Id_User=<?php echo $Id_User; ?>&Uname=<?php echo $Uname; ?>&click=o"><span class="fa fa-reply">  </span> Kembali</a>
                </li>
                <li>
                    <a class="dropdown-item" data-toggle="tab" href="#DtAgm" onclick="tmplAgm()"><span class="fa fa-child">  </span> Data Agama</a>
                </li>
                <li>
                    <a class="dropdown-item" data-toggle="tab" href="#DtJbtn" onclick="tmplJbtn()"><span class="fa fa-suitcase">  </span> Data Jabatan</a>
                </li>
                <li>
                    <a class="dropdown-item" data-toggle="tab" href="#DtUser" onclick="tmplUser()"><span class="fa fa-users">  </span> Data User</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pegawai <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">semua tentang pegawai</li>
                    <li><a class="dropdown-item" data-toggle="tab" href="#ProfPeg" onclick="tmplProfPeg()"><span class="fa fa-street-view">  </span> Profil Pegawai</a></li>
                    <li><a class="dropdown-item" data-toggle="tab" href="#BioPeg" onclick="tmplBioPeg()"><span class="fa fa-user">  </span> Biografi Pegawai</a></li>
                    <li><a class="dropdown-item" data-toggle="tab" href="#AbsPeg" onclick="tmplAbsPeg()"><span class="fa fa-book">  </span> Absensi Pegawai</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gaji <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">semua tentang gaji pegawai</li>
                    <li><a class="dropdown-item" data-toggle="tab" href="#Tunjangan" onclick="tmplGajiPeg()"><span class="fa fa-eye">  </span> Detail Gaji</a></li>
                    <li><a class="dropdown-item" data-toggle="tab" href="#FilGaj" onclick="tmplFilGaji()"><span class="fa fa-dollar">  </span> Filter Gaji</a></li>
                  </ul>
                </li>
            </ul>
        </nav>
        <?php } else if($Id_User == 3 && $click == 'inv-peg') { ?>
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <img src="..\..\images\DBase_Logo.png" class="navbar-brand">
                </li>
                <li>
                    <a href="../../index.php?Id_User=<?php echo $Id_User; ?>&Uname=<?php echo $Uname; ?>&click=o"><span class="fa fa-reply">  </span> Kembali</a>
                </li>
                <li><a class="dropdown-item" data-toggle="tab" href="#DtUser" onclick="tmplUserM()"><span class="fa fa-users">  </span> Data User Pegawai</a>
                </li>
                <li><a class="dropdown-item" data-toggle="tab" href="#ProfPeg" onclick="tmplProfPeg()"><span class="fa fa-street-view">  </span> Profil Pegawai</a></li>
                <li><a class="dropdown-item" data-toggle="tab" href="#BioPeg" onclick="tmplBioPeg()"><span class="fa fa-user">  </span> Biografi Pegawai</a></li>
            </ul>
        </nav>
        <?php }else if($Id_User == 3 && $click == 'sal-peg') { ?>
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <img src="..\..\images\DBase_Logo.png" class="navbar-brand">
                </li>
                <li>
                    <a href="../../index.php?Id_User=<?php echo $Id_User; ?>&Uname=<?php echo $Uname; ?>&click=o"><span class="fa fa-reply">  </span> Kembali</a>
                </li>
                <li><a class="dropdown-item" data-toggle="tab" href="#Tunjangan" onclick="tmplGajiPeg()"><span class="fa fa-users">  </span>Tunjangan Pegawai</a>
                </li>
                <li><a class="dropdown-item" data-toggle="tab" href="#FilGaj" onclick="tmplFilGaji()"><span class="fa fa-street-view">  </span> Gaji Pegawai</a></li>
            </ul>
        </nav>
        <?php } ?>
        </div>