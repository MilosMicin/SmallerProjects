<html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $naslov;?></title>
        <link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css">
	<script src="<?php echo base_url();?>jquery/jquery.min.js"></script>
	<script src="<?php echo base_url();?>jquery/efekti.js"></script>
</head>
<body>
	<div id="header">
		<div class="clearfix">			
			<ul class="navigation">
			<div class="logo">
                            <a href="<?php echo base_url();?>pocetna"><img src="<?php echo base_url();?>images/logo.jpg" alt="LOGO" height="70" width="300"></a>
			</div>
                            <li class="active">
                                    <?php echo anchor("pocetna", "Home"); ?>
                            </li>
                            <li>
                                    <?php echo anchor("pocetna/rezervacije", "Rezervacija"); ?>
                            </li>
                            <li>
                                    <?php echo anchor("pocetna/repertoar", "Repertoar"); ?>
                            </li>
                            <li>
                            <?php
                                $session = $this->session->userdata("ulogovan");
                                if(!empty($session) && $session)
                                {                                       
                                    echo anchor("logovanje/logout", "Izloguj se");
                                }
                                else
                                {
                                    echo anchor("logovanje", "Uloguj se");
                                }
                            ?>
                            </li>                               
			</ul>
		</div>
	</div>