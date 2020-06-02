<?php
  require('../config/mc_table.php');
	include('../config/koneksi.php');

	define('FPDF_FONTPATH', '../pdf/font/');

 $Id_User = $_GET['Id_User'];
 $bulan = $_POST['bln_Jrnl_Peg'];
 $arrayblnJrnl = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
 $blnJrnl = $arrayblnJrnl[$bulan];
 $amblProfPeg = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_ProfPeg WHERE Id_User='$Id_User'"));
 $NoPeg = $amblProfPeg['NoPeg'];
 $NmPeg = $amblProfPeg['NmPeg'];
 $amblBioPeg = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_BioPeg WHERE NoPeg='$NoPeg'"));
 $Almt = $amblBioPeg['Almt'];
 $Jbtn = $amblBioPeg['Jbtn'];
 $amblJabatanPeg = mysqli_fetch_array(mysqli_query($dbcon,"SELECT * FROM tbl_Jbtn WHERE IdJbtn='$Jbtn'"));
 $NmJbtn = $amblJabatanPeg['NmJbtn'];
 $Level = $amblJabatanPeg['Level'];
 $Jabatan = $NmJbtn .' - '. $Level;
 $amblJurnal = mysqli_query($dbcon,"SELECT * FROM tbl_Jrnl_Peg WHERE id_usr_peg='$Id_User' && bln_Jrnl_Peg='$bulan'");
 $Tanggal = date('d/M/Y');

 $pdf = new PDF_MC_Table('P','mm','A4');
 $pdf->AddPage();
 $pdf->Ln(3);

  $pdf->SetFont('Arial','B',8);
  $pdf->SetFillColor(255,255,255);
  $pdf->SetTextColor(0,0,0);
  $pdf->Cell(190,7,'Tanggal Cetak :'.$Tanggal,0,0,'R',true);
  $pdf->Ln();

  $pdf->SetTextColor(60,60,60);
  $pdf->SetFont('Times','B','10');
  $pdf->Cell(200,0,'JURNAL PEGAWAI',0,0,'C');
  $pdf->Ln(4);
  $pdf->Cell(200,0,'PYXIS ULTIMATE SOLUTION',0,0,'C');
  $pdf->Ln(10);

 $pdf->SetFont('Arial','','8');
 $pdf->Cell(25,1,'Nama');
 $pdf->Cell(10,1,'=');
 $pdf->Cell(4,1,$NmPeg);
 $pdf->Ln(5);
 $pdf->Cell(25,1,'Jabatan');
 $pdf->Cell(10,1,'=');
 $pdf->Cell(4,1,$Jabatan);
 $pdf->Ln(5);
 $pdf->Cell(25,1,'Bulan Jurnal');
 $pdf->Cell(10,1,'=');
 $pdf->Cell(4,1,$blnJrnl);
 $pdf->Ln(5);
 
 $pdf->SetFont('Arial','B',8);
 $pdf->SetWidths(array(10,30,40,60,20,30));
 $pdf->SetFillColor(192,192,192);
 $pdf->SetTextColor(0,0,0);
 $pdf->SetLineWidth(.3);
 $pdf->Cell(10,10,'No',1,0,'C',1);
 $pdf->Cell(30,10,'Waktu',1,0,'C',1);
 $pdf->Cell(40,10,'Ringkasan',1,0,'C',1);
 $pdf->Cell(60,10,'Hasil',1,0,'C',1);
 $pdf->Cell(20,10,'Persentase',1,0,'C',1);
 $pdf->Cell(30,10,'Keterangan',1,0,'C',1);
 $pdf->Ln();

 $pdf->SetFont('Arial','',8);
 $pdf->SetFillColor(255,255,255);
 $pdf->SetTextColor(0,0,0);
 $pdf->SetLineWidth(.3);
 $No=0;
 srand(microtime()*1000000);
 while($jurnal=mysqli_fetch_row($amblJurnal)){
    $No++;
    $waktu = $jurnal['1'];
    $ringkasan = $jurnal['4'];
    $hasil = $jurnal['5'];
    $persentase = $jurnal['7'];
    $keterangan = $jurnal['8'];
    $pdf->Row(array($No,$waktu,$ringkasan,$hasil,$persentase.'%',$keterangan));
 }

 $pdf->Ln(10);
 $pdf->SetFont('Arial','','8');
 $pdf->Cell(170,1,'HRD & GA',0,0,'R');
 $pdf->Ln(5);
 $pdf->Cell(170,1,'Assistant Manager',0,0,'R');
 $pdf->Ln(20);
 $pdf->Cell(170,1,'P.Budi Artodibyo',0,0,'R');
 $pdf->Output();
?>