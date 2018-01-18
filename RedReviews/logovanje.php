<?php
	@session_start();
	
	include ('konekcija.php');
	if(isset($_POST['btnRegistracija']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$upit = "SELECT * FROM registracija WHERE username = '".$username."' AND password = '".$password."'";
		$rezultat = mysql_query($upit, $konekcija);
		if(mysql_num_rows($rezultat) != 0)
		{
			$red = mysql_fetch_array($rezultat);
			$username = $red['username'];
			
			$_SESSION['logovanje'] = $username;
			header('Location:anketa.php');
		}
	}
?>
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
									
				$upit_link= "SELECT * FROM linkovi WHERE link_roditelj=0";
				$rezultat_link = mysql_query($upit_link,$konekcija);
				
				echo("<ul id='topnavi'>");
				echo "<li class='active'><a href='index.php'>HOME</a></li>";
				while($r=mysql_fetch_array($rezultat_link)){
					echo "<li>
					<a href=".$r['link_putanja'].">".$r['link_ime']."</a>";
					echo "</li>";
				}
				echo "</ul>";
				mysql_close($konekcija);
			?>
    </div>
    <div id="header">
    	<img src="img/header.jpg" alt="" width="1000" height="183" />
    </div>
    <div id="main">
    	<div id="left-part">
        	<h1>Category</h1>
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
        	<p><h2>Logovanje</h2></p>
			<p>Ulogujte se za pristup anketi.</p>
			<form name = "registracija" method = "POST" action = "logovanje.php">
				<table style = "margin:opx auto;">
					<tr>
						<td>Username</td>
					</tr>
					<tr>
						<td><input type = "text" name = "username"></td>
					</tr>
					<tr>
						<td>Password</td>
					</tr>
					<tr>
						<td><input type = "password" name = "password"></td>
					</tr>
					<tr>
						<td><input type = "submit" name = "btnRegistracija"></td>
					</tr>
				</table>
				<p><a href = "registracija.php">Za registrovanje pritisnite ovde!</a></p>
			</form>
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