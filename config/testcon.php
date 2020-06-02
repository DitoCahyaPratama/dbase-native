<?php
	$agm = mysqli_query($dbcon,"CREATE TABLE tbl_Agm(
							IdAgm INT(9) NOT NULL PRIMARY KEY,
							NmAgm VARCHAR(20) NOT NULL
						)");

	$Kewarganegaraan = mysqli_query($dbcon,"CREATE TABLE tbl_Kewarganegaraan(
										IdKewarganegaraan INT(9) NOT NULL PRIMARY KEY,
										NmKewarganegaraan VARCHAR(20) NOT NULL
									)")
	$Jbtn = mysqli_query($dbcon,"CREATE TABLE tbl_Jbtn(
							IdJbtn INT(9) NOT NULL PRIMARY KEY,
							NmJbtn VARCHAR(20) NOT NULL
						)")
	$profpeg = mysqli_query($dbcon,"CREATE TABLE tbl_ProfPeg(
								NoPeg INT(9) NOT NULL PRIMARY KEY,
								NmPeg VARCHAR(100) NOT NULL,
								TglGabung date NOT NULL,
								FotoPeg VARCHAR(20)
							)")

	$biopeg = mysqli_query($dbcon,"CREATE TABLE tbl_BioPeg(
								NoPeg INT(9) NOT NULL,
								TmptLhr VARCHAR(50) NOT NULL,
								TglLhr date NOT NULL,
								Gndr VARCHAR(10) NOT NULL,
								Almt VARCHAR(200) NOT NULL,
								NoTelp VARCHAR(20) NOT NULL,
								Agm VARCHAR(20) NOT NULL,
								StsNkh VARCHAR(20) NOT NULL,
								Kewarganegaraan VARCHAR(50) NOT NULL,
								Jbtn VARCHAR(50) NOT NULL,
								PndAkr VARCHAR(100) NOT NULL,
								Email VARCHAR(100) NOT NULL,
								GolDar VARCHAR(10) NOT NULL,
								ContDar VARCHAR(100) NOT NULL,
								NoKTP VARCHAR(100) NOT NULL, 
								FOREIGN KEY (NoPeg) REFERENCES tbl_ProfPeg(NoPeg)
							)")
?>	