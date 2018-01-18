<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="bred<" />
	<meta name="keywords" content="bred<" />
	<meta name="description" content="bred<" />
	<meta name="robots" content="all" />
	<link rel="stylesheet" type="text/css" href="jquery.lightbox-0.5.css" media="screen" />
	<title>Red Recenzija</title>
	<script type = "text/javascript" src = "ajax.js"></script>
	<script type = "text/javascript" src = "telefoni.js"></script>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="jquery.lightbox-0.5.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	  $('#galerija a').lightBox();
	});
</script>
	<style type="text/css" title="currentStyle" media="screen">
		@import "./css/global.css";
	</style>
    <link href='http://fonts.googleapis.com/css?family=Asap:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
<?php
	include('konekcija.php');
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
			<p><h1>Slike iz ruke</h1></p>
        	<p><a href = "slike.php">Kliknite za unost slike</a></p>
			<form name = "galerija" action = "galerija.php" method = "POST";>
				<p>Izaberite jedan od telefona iz padajuće liste da bi videli slike iz ruke.</p>
				<p>	<select name = "ddlGalerija">
						<option value = "0">Izaberi...</option>
						<?php
							$query="SELECT * FROM galerija";
							$rezultat=mysql_query($query,$konekcija);
							while($red=mysql_fetch_array($rezultat))
							{
								print "<option value='{$red['id_galerija']}'>{$red['naziv_galerije']}</option>";
							}	
						?>
					</select></p>
					<input type="submit" value="Prikaz" class="button" name="btnPrikaz" />
			</form>
			<div id="galerija">
				<?php
					if(isset ($_POST['btnPrikaz']))
					{
						$idGalerija=$_POST['ddlGalerija'];
						$select_query="SELECT * FROM slika WHERE id_galerija=".$idGalerija;
						$rezultat=mysql_query($select_query,$konekcija);
						$slike=array();
						$putanja_male=$dir_male.'galerija_'.$idGalerija;
						$putanja_velike=$dir_velike.'galerija_'.$idGalerija;
						while($red=mysql_fetch_array($rezultat))
						{
						  $slike[]=$red;
						}
						$br = count($slike)/3;
						$broj_redova=count($slike)%3;
						if($broj_redova != 0)
						{
							$br++;
						}
						for($i=0,$k=0; $i<$br; $i++,$k+=3)
						{
							print "<div class='red_slika'>";
							for($j=$k;$j<$k+3; $j++)
							{
								if(isset($slike[$j]))
								{
									print "<div class='img'>";
									print "<a href='".$putanja_velike.$slike[$j]['fajl']."'>";
									print "<img src='".$putanja_male.$slike[$j]['fajl']."'/></a>";
									print "<div class='desc'>".$slike[$j]['naziv']."</div>";
									print "</div>";
								}
							}
							print "<div class='clearer'></div>";
							print "</div>";
						}
						mysql_close($konekcija);
					}
?>
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
