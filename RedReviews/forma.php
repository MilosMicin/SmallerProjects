<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="bred<" />
	<meta name="keywords" content="bred<" />
	<meta name="description" content="bred<" />
	<meta name="robots" content="all" />
	<script type = "text/javascript" src = "ajax.js"></script>
	<script type = "text/javascript" src = "telefoni.js"></script>
	<title>Red Recenzija</title>

	<style type="text/css" title="currentStyle" media="screen">
		@import "./css/global.css";
	</style>
    
    <link href='http://fonts.googleapis.com/css?family=Asap:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
	<div id="wrapper">
		<div id="top">
			<h1 class="logo"><span class="green1">RED</span> RECENZIJA</h1>
				<?php
				include('konekcija.php');
									
				$upit= "SELECT * FROM linkovi WHERE link_roditelj=0";
				$rezultat = mysql_query($upit,$konekcija);
				
				echo("<ul id='topnavi'>");
				echo "<li class='active'><a href='index.php'>HOME</a></li>";
				while($r=mysql_fetch_array($rezultat)){
					echo "<li>
					<a href=".$r['link_putanja'].">".$r['link_ime']."</a>";
					echo "</li>";
				}
				echo "</ul>";
			?>
		</div>
		<div id="header">
			<img src="img/header.jpg" alt="" width="1000" height="183" />
		</div>
		<div id="main">
			<div id="left-part">
				<p><h1>Category</h1></p>
				<ul id="subnavi">
					<li class="active"><a href="index.php">HOME</a></li>
					<li><a href="#" onclick = "telefon1(this.value);">Samsung Galaxy S6</a></li>
					<li><a href="#" onclick = "telefon2(this.value);">Samsung Galaxy Edge</a></li>
					<li><a href="#" onclick = "telefon3(this.value);">Apple iPhone 6</a></li>
					<li><a href="#" onclick = "telefon4(this.value);">Nokia Lumia 920</a></li>
					<li><a href="#" onclick = "telefon5(this.value);">Sony Experia Z1</a></li>
				</ul>
				
			</div>
			<div id="right-part">
			<p>Da bi proverili koje marke telefona vama odgovaraju, molimo vas da popunite formular. On nam je pokazatelj
			kojim telefonima najviše treba da se okrenemo, kao i da vidimo koji je najpopularniji televon u društvenoj zajednici.<p>
			
				<?php
					include('konekcija.php');
					
					$upit_marke = "SELECT * FROM marka ORDER BY ime_marke";
					
					$rezultat_marke = mysql_query($upit_marke, $konekcija);
					
					if(!$rezultat_marke)
					{
						echo "Opcija omiljene marke nije selektovana!".mysql_error();
					}
					else
					{
						$marke = "";
						while($r = mysql_fetch_array($rezultat_marke))
{
						$marke .= "<option value = '".$r['id_marka']."'>".$r['ime_marke']."</option>";
}
					}
				?>
				<div id = "form">
					<form name = "forma" action = "forma.php" method = "POST">
						<h1>Prijava</h1>
						<table>
							<tr>
								<td>
									Ime:
								</td>
								<td>
									<input type = "text" name="tbIme" id = "tbIme"/>
								</td>
								<td>
									Pol: Muski<input type = "radio" name = "rbPol" value = "M"/>
									Ženski<input type = "radio" name = "rbPol" value = "Z"/>
								</td>
							</tr>
							<tr>
								<td>
									Prezime:
								</td>
								<td>
									<input type = "text" name="tbPrezime" id = "tbPrezime"/>
								</td>
								<td>
									Omiljena marka:	<select name = "ddlMarka">
												<option value = "0">Izaberi:</option>
												<?php print $marke; ?>
											</select>
								</td>
							</tr>
							<tr>
								<td>
									Email:
								</td>
								<td>
									<input type = "text" name="tbMail" id = "tbMail"/>
								</td>
							</tr>
							<tr>
								<td>
									<input type = "submit" class = "button" name = "btnUpis" value = "Upis"/>
								</td>
							</tr>
						</table>
					</form>
				</div>
				
				<?php
					if(isset($_POST['btnUpis']))
					{
						$ime = $_POST['tbIme'];
						$prezime = $_POST['tbPrezime'];
						$mail = $_POST['tbMail'];
						$pol = $_POST['rbPol'];
						$marka = $_POST['ddlMarka'];
						
						$reIme = "/^[A-Z][a-z]{2,10}$/";
						$rePrezime = "/^[A-Z][a-z]{2,20}$/";
						$reMail = "/^[a-zA-Z0-9\.\-]+@[a-zA-Z0-9\.\-]+$/";
						
						if(!preg_match($reIme, $ime))
						{
							echo "Niste uneli pravilno ime!";
							break;
						}
						else if(!preg_match($rePrezime, $prezime))
						{
							echo "Niste uneli pravilno prezime!";
						}
						else if(!preg_match($reMail, $mail))
						{
							echo "Niste uneli dobaro Email adresu!";
							break;
						}
						else if(empty($pol))
						{
							echo "Unesite pol!";
							break;
						}
						else if($marka == "0")
						{
							echo "Izaberite marku!";
							break;
						}
						
						$upit = "INSERT INTO prijava VALUES('', '$ime', '$prezime', '$mail', '$pol', '$marka')";
						
						$rezultat = mysql_query($upit, $konekcija);
						
						if($rezultat)
						{
							echo "Uspešno ste uneli podatke!";
							echo '<a href = "prikaz.php">Prikaz podataka</a>';
						}
						mysql_close($konekcija);
					}
					
				?>
				<div>
				</div>
			</div>
		</div>
		<div id="footer">
			<p>© Copyright 2012 yourname.com. All Rights Reserved. <br />
			<span class="darkgrey">Design by <a href="http://www.prontomoda.de/" target="_blank" title="Handtaschen">Handtaschen</a></span></p>
			<a href = "milos.php"><b>Miloš Mićin 180/13</b></a><br>
			<a href = "dokumentacija.pdf"><h3><b>DOKUMENTACIJA</b></h3></a>
		</div>
	</div>
	<div style="margin: 1em 0 3em 0; text-align: center;">
	</div>
</body>
</html>