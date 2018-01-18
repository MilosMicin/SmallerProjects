<?php
	@session_start();
	if(isset($_SESSION['uloga']))
	{
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
<?php
	include('konekcija.php');
	include('fja.php');
?>
<div id="wrapper">
	<div id="top">
		<h1 class="logo"><span class="green1">RED</span> RECENZIJA </h1>
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
				<form name="form" method="POST" action="slike.php" enctype="multipart/form-data">
					<table style="width:500px; margin:0 auto;">
						<tr>
							<th colspan="2"><h3>Postavljanje slika</h3></th>
						</tr>
						<tr>
							<td>Naziv slike:</td>
							<td>
							   <input type="text" class="styled" id="tbImeSlike" name="tbImeSlike" />
							</td>
						</tr>
						<tr>
							<td>Slika:</td>
							<td>
							   <input type="file" class="styled" id="tbSlika" name="tbSlika" />
							</td>
						</tr>
						<tr>
							<td>Telefoni:</td>
							<td>
								<select name="ddlGalerija" id="ddlGalerija">
									<option value='0'>Izaberite galeriju....</option>
									<?php
										$query="SELECT * FROM galerija";
										$rezultat=mysql_query($query,$konekcija);
										while($red=mysql_fetch_array($rezultat))
										{
											print "<option value='{$red['id_galerija']}'>{$red['naziv_galerije']}</option>";
										}	
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input type="submit" value="Postavi" class="button" name="btnPostavi" />
							</td>
						</tr>
					</table>
				</form>
					<?php
						if(isset($_POST['btnPostavi']))
						{
							$ime_slike=$_POST['tbImeSlike'];
							$fajl=$_FILES['tbSlika'];
							$idGalerija=$_POST['ddlGalerija'];
							$greske=array();
											
							if($fajl['type']=='image/jpg' || $fajl['type']=='image/jpeg')
							{
								$ime_fajla=$fajl['name'];
								$tmp_name=$fajl['tmp_name'];
								$galerija='galerija_'.$idGalerija;
								if(move_uploaded_file($tmp_name,$dir_velike.$galerija.$ime_fajla))
								{
									malaslika($dir_velike.$galerija.$ime_fajla,$dir_male.$galerija.$ime_fajla,100,100);
									if($konekcija)
									{
										$unos_query="INSERT INTO slika(id_galerija,naziv,fajl) VALUES($idGalerija,'$ime_slike','$ime_fajla')";
										$rezultat=mysql_query($unos_query,$konekcija);
									}
								}
							}
							mysql_close($konekcija);
						}
					?>
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
<?php
	}
	else
	{
		echo "<a href = 'admin.php'>Morate se ulogovati kao admin da bi usli na stranicu!</a>";
	}
?>