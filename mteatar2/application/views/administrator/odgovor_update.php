<?php   
    $options = array('0' => 'Izaberi..');
    foreach($ankete as $anketa):
        $options[$anketa['id_anketa']] = $anketa['pitanje'];
    endforeach;
    $q = "style = 'height: 24px;width: 590px;margin: 0 0 18px;padding: 0 4px;'";
?>
<div id="contents">			
		<div class="highlight">
                        <div class="clearfix">
                            <?php echo form_open_multipart("anketa/adminOdgovori/update_odgovor", array('class' => 'message')); ?>
                            <table>
                                <tr>
                                    <td><?php echo form_label("ID:", "lID"); ?></td>                                                                                                     
                                </tr>
                                <tr>                                        
                                    <td><?php echo form_input("tbId"); ?></td>                                          
                                </tr>
                                <tr>
                                    <td><?php echo form_label("Odgovor:", "lOdgovor"); ?></td>                                                                                                     
                                </tr>
                                <tr>                                        
                                    <td><?php echo form_input("tbOdgovor"); ?></td>                                          
                                </tr>
                                <tr>
                                    <td><?php echo form_label("Pitanje:", "lPitanje"); ?></td>                                                                                                     
                                </tr>
                                <tr>                                        
                                    <td><?php echo form_dropdown("ddlPitanje",$options,'0',$q); ?></td>                                          
                                </tr>
                                <tr>
                                    <td><input type="submit" value="Izmeni" name = "btnIzmeni" /></td>
                                </tr>
                            </table>
                            
                            <table border = '1'>
                                <?php foreach ($odgovori as $odgovor):?>
                                <tr>
                                    <td width = '20px'><?php echo $odgovor['id_odgovori'];?></td><td width = '300px'><?php echo $odgovor['pitanje'];?></td><td td width = '300px'><?php echo $odgovor['odgovori'];?></td>
                                </tr>
                                <?php endforeach;?>
                            </table>
                            <?php 
                                echo form_close(); 
                                if(isset($status))
                                {
                                    redirect(base_url()."anketa/adminOdgovori/update_odgovor");                                   
                                }
                                echo anchor("admin","Admin strana");
                            ?>                            			                                                              
			</div>
		</div>		
		
	</div>

