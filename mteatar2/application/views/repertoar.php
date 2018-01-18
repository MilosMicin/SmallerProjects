<?php
    
?>
<div id="contents">			
		<div class="highlight">
			<div class="clearfix">
			    <?php foreach ($predstava as $p):?>
                                <table border = "1" >
                                    <tr>
                                        <td rowspan="3"><img width="250" height="150" src="<?php echo base_url()."".$p['slika'];?>" ></td><td style="width: 100%;"><?php echo $p['naziv_predstava']?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $p['opis']?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $p['naziv_pozoriste']?></td>
                                    </tr>
                                </table> 
                            <?php endforeach; ?>
                            <?php echo $paginacija;?>
			</div>
		</div>		
		
	</div>

