<?php
	$host = "localhost";
	$korisnik = "root";
	$lozinka = "";
	
	$konekcija = mysql_connect($host, $korisnik, $lozinka) or die ("Niste se uspešno konektovali na bazu".mysql_error());
	$baza = mysql_select_db('baza', $konekcija) or die('Baza podataka nije selektovana'.mysql_error());
	
	$dir_male='slike/male/';
	$dir_velike='slike/';
?>
