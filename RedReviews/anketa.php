<?php
	@session_start();
	if(isset($_SESSION['logovanje']))
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
<div id="wrapper">
	<div id="top">
		<h1 class="logo"><span class="green1">RED</span> RECENZIJA </h1>
			<?php
				include('konekcija.php');
									
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
        	<p><h2>Anketa</h2></p>
			<p>Molimo vas da ocenite sajt.</p>
			<form name = "anketa" method = "POST" action = "anketa.php">
				<table>
					<tr>
						<td>
							1:
						</td>
						<td>
							<input type = "radio" name = "ocena" value = "1"/>
						</td>
					</tr>
					<tr>
						<td>
							2:
						</td>
						<td>
							<input type = "radio" name = "ocena" value = "2"/>
						</td>
						
					</tr>
					<tr>
						<td>
							3:
						</td>
						<td>
							<input type = "radio" name = "ocena" value = "3"/>
						</td>
						<td>
					</tr>
					<tr>
						<td>
							4:
						</td>
						<td>
							<input type = "radio" name = "ocena" value = "4"/>
						</td>
						
					</tr>
					<tr>
						<td>
							5:
						</td>
						<td>
							<input type = "radio" name = "ocena" value = "5"/>
						</td>
					</tr>
					<tr>
						<td>
							<input type = "submit" name = "unos" value = "Unos"/>
						</td>
					</tr>
				</table>
			</form>
			<?php
				if(isset($_POST['unos']))
				{
					$OCENA=$_POST['ocena'];
					$PET=0;
					$CETRI=0;
					$TRI=0;
					$DVA=0;
					$JEDAN=0;
					$brojocena=0;
					
					$brojocena++;
	
					if($OCENA==5){
						$PET+=5;
						}
					if($OCENA==4){
						$CETRI+=4;
						}
					if($OCENA==3){
						$TRI+=3;
						}	
					if($OCENA==2){
						$DVA+=2;
						}
					if($OCENA==1){
						$JEDAN+=1;
						}
					
					$zbirocena=$PET+$CETRI+$TRI+$DVA+$JEDAN;
					$prosek=$zbirocena/$brojocena;

					 $upit = "INSERT INTO anketa VALUES('','$brojocena','$zbirocena','$prosek')";
					 
					 $rezupita=mysql_query($upit, $konekcija) or die("konekcija nije uspela".mysql_error());
					
					if($rezupita)
					{
						echo'Ocenjeno!';
					}
				}
				mysql_close($konekcija);
				
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
		echo "<a href = 'logovanje.php'>Morate se ulogovati da bi videli stranicu!</a>";
	}
?>