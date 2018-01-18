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
            <img src="img/telefon/telefon6.jpg" alt="" width="251" height="196" class="right"/>
        </div>
    	<div id="right-part">
        	<h1>Headline</h1>
            <p><img src="img/telefon/telefon.jpg" alt="" width="251" height="196" class="right" />Lorem ipsum dolor sit amet, 
            consectetur adipiscing elit. Vestibulum ornare elementum neque at lobortis. 
            Fusce ac orci diam. Ut ac tellus in lorem commodo vulputate a vitae ligula. Proin nisl lectus, lacinia id 
            egestas eu, hendrerit id purus. In accumsan felis in sem pulvinar condimentum eget sed odio. Etiam sapien 
            leo, tincidunt at vulputate quis, suscipit eget lacus. Nunc vestibulum felis ut eros adipiscing at ornare 
            magna vulputate. Nulla viverra malesuada malesuada. Vestibulum ante ipsum primis in faucibus orci luctus 
            et ultrices posuere cubilia Curae;</p>

            <p>Mauris id est mi, varius <a href="#">dignissim lectus</a>. Sed ante lorem, vulputate sed tempor tristique, elementum quis 
            tortor. Etiam consequat, sapien id eleifend suscipit, odio felis consequat enim, quis tincidunt leo magna 
            semper ante. Phasellus ut felis eget felis adipiscing aliquam a vitae dolor. Pellentesque pulvinar condimentum 
            nibh, eu vulputate justo fermentum et. Ut sit amet augue fermentum elit dignissim accumsan. Vestibulum ante 
            ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi et quam vitae dolor ornare 
            laoreet. Ut feugiat consequat tellus id tincidunt. Duis a placerat eros. Proin vel arcu at ipsum hendrerit 
            aliquam. Nullam quam ipsum, sagittis non vehicula non, pellentesque ut dolor.</p>
            
            <h1>H1 Headline</h1>

            <h2>H2 Headline</h2>
            
            <p>List:</p>
			<ul class="list">
                <li>Nulla viverra malesuada malesuada. Vestibulum ante ipsum primis in faucibus</li>
                <li>Nulla viverra malesuada malesuada. Vestibulum ante ipsum primis in faucibus</li>
                <li>Nulla viverra malesuada malesuada. Vestibulum ante ipsum primis in faucibus</li>
                <li>Nulla viverra malesuada malesuada. Vestibulum ante ipsum primis in faucibus</li>
                <li>Nulla viverra malesuada malesuada. Vestibulum ante ipsum primis in faucibus</li>
            </ul>

            <p><a href="#">This</a> is a link. </p>
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
