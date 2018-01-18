<?php
    $pozoristaItem = array('#' => 'Izaberi...');
    foreach($pozoriste as $poz):
        $pozoristaItem[$poz['id_pozoriste']] = $poz['naziv_pozoriste'];
    endforeach;
     $q = "style = 'height: 24px;width: 590px;margin: 0 0 18px;padding: 0 4px;'";  
?>
<div id="contents">			
		<div class="highlight">
                        <div class="clearfix">
                            <?php echo form_open_multipart("admin/upravljanje_repertoarima/update"/*, array('class' => 'message')*/); ?>
                            <table>
                                <tr>
                                    <td><?php echo form_label("ID:", "lId"); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo form_input("tbID"); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo form_label("Naziv predstava:", "lnaziv predstava"); ?></td>                                                                                                     
                                </tr>
                                <tr>                                        
                                    <td><?php echo form_input("tbNaziv"); ?></td>                                          
                                </tr>
                                <tr>
                                    <td><?php echo form_label("Opis:", "lOpis"); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo form_textarea(array('name' => 'tbOpis','rows' => '10','cols' => '81')); ?></td>
                                </tr> 
                                <tr>
                                    <td><?php echo form_label("Pozoriste:", "lPozoriste"); ?></td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 15px;"><?php echo form_dropdown("ddlPozoriste", $pozoristaItem,'',$q); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo form_label("Slika:", "lSlika"); ?></td>
                                </tr>
                                <tr>                   
                                    <td style="padding-bottom: 15px;"><?php echo form_upload("tbSlike"); ?></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="Unesi" name = "btnUpdate" /></td>
                                </tr>
                            </table>
                            <?php 
                                echo form_close(); 
                                if(isset($status))
                                {
                                    redirect(base_url()."admin/upravljanje_repertoarima/update");                                   
                                }
                            ?>
                            
			    <?php foreach ($predstave as $pr):?>
                                <table border = "1" width="100%">
                                    <tr>
                                        <td width = '20px'><?php echo $pr['id_predstava']?></td>
                                        <td width = '100px'><?php echo $pr['naziv_predstava']?></td>
                                        <td width = '400px'><p><?php echo $pr['opis']?></p></td>  
                                        <td width = '150px'><?php echo $pr['naziv_pozoriste']?></td> 
                                        <td><img width="250" height="150" src="<?php echo base_url()."".$pr['slika'];?>" ></td>
                                    </tr>
                                </table> 
                            <?php endforeach; ?>                
			</div>
		</div>		
		
	</div>

