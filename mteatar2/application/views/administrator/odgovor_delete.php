<?php   
    $options = array('0' => 'Izaberi..');
    foreach($ankete as $anketa):
        $options[$anketa['id_anketa']] = $anketa['pitanje'];
    endforeach;
?>
<div id="contents">			
		<div class="highlight">
                        <div class="clearfix">
                            <?php echo form_open_multipart("anketa/adminOdgovori/delete_odgovor"/*, array('class' => 'message')*/); ?>                                                      
                            <table border = '1'>
                                <?php foreach ($odgovori as $odgovor):?>
                                <tr>
                                    <td width = '20px'><?php echo $odgovor['id_odgovori'];?></td><td width = '300px'><?php echo $odgovor['pitanje'];?></td><td td width = '300px'><?php echo $odgovor['odgovori'];?></td>
                                    <td><?php echo form_checkbox('cbBrisanje[]', $odgovor['id_odgovori']); ?></td>
                                </tr>
                                <?php endforeach;?>
                            </table>
                            <?php echo form_submit('brnBrisi', 'Brisanje'); ?>
                            <?php 
                                echo form_close(); 
                                if(isset($status))
                                {
                                    redirect(base_url()."anketa/adminOdgovori/delete_odgovor");                                   
                                }
                                echo anchor("admin","Admin strana");
                            ?>                            			                                                              
			</div>
		</div>		
		
	</div>

