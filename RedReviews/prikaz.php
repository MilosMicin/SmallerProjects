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
        	<p><h1>Prikaz</h1></p>
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
			
				
				<?php
					
					$index = 1;
					echo "<table border = '1'>";
					echo "<tr><th>#</th><th>Ime</th><th>Prezime</th><th>Email</th><th>Pol</th><th>Marka</th></tr>";
					
					$upit = "SELECT * FROM prijava";
					$rezultat = mysql_query($upit, $konekcija);
					while($niz = mysql_fetch_array($rezultat))
					{
						if($niz['pol'] == 'M')
						{
							$niz['pol'] = 'Muski';
						}
						else
						{
							$niz['pol'] = 'Zenski';
						}
						
						if($niz['marka'] == "1")
						{
							$niz['marka'] = "Apple";
						}
						else if($niz['marka'] == "2")
						{
							$niz['marka'] = "LG";
						}
						else if($niz['marka'] == "3")
						{
							$niz['marka'] = "Nokia";
						}
						else if($niz['marka'] == "4")
						{
							$niz['marka'] = "Samsung";
						}
						else if($niz['marka'] == "5")
						{
							$niz['marka'] = "Sony";
						}
						
						echo '<tr><td>'.$index.'</td><td>'.$niz['ime'].'</td><td>'.$niz['prezime'].'</td><td>'.$niz['mail'].'</td><td>'.$niz['pol'].'</td>
						<td>'.$niz['marka'].'</td></tr>';
						$index++;
					}
					echo "</table>";
					mysql_close($konekcija);
				?>
				<div>
				</div>
			</div>
		</div>
		<div id="footer">
			<p>© Copyright 2012 yourname.com. All Rights Reserved. <br />
			<a href = "milos.php"><b>Miloš Mićin 180/13</b></a><br>
			<a href = "dokumentacija.pdf"><h3><b>DOKUMENTACIJA</b></h3></a>
		</div>
	</div>
	<div style="margin: 1em 0 3em 0; text-align: center;">
	</div>
</body>
</html>