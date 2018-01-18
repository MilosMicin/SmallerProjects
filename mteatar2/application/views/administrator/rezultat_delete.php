<?php
    $pitanje = array('0' => 'Izaberite...');
    foreach ($ankete as $anketa):
        $pitanje[$anketa['id_anketa']] = $anketa['pitanje'];
    endforeach;
    $odgovor = array('0' => 'Izaberite...');
    foreach ($odgovori as $o):
        $odgovor[$o['id_odgovori']] = $o['odgovori'];
    endforeach;
    array('name' => 'tbLozinka', 'id' => 'tbLozinka', 'style' => 'height: 24px;width: 590px;margin: 0 0 18px;padding: 0 4px;');
    $q = "style = 'height: 24px;width: 590px;margin: 0 0 18px;padding: 0 4px;'";
?>
<div id="contents">			
		<div class="highlight">
                        <div class="clearfix">
                            <?php echo form_open("anketa/adminRezultati/delete", array('class' => 'message')); ?>                                                        
                            <table border = '1'>
                                <th>ID</th><th>Pitanja</th><th>Odgovori</th><th>Rezultati</th><th>X</th>
                                <?php foreach ($rezultati as $rezultat):?>
                                <tr>
                                    <td width = '20px'><?php echo $rezultat['id_rezultat'];?></td><td width = '300px'><?php echo $rezultat['pitanje'];?></td>
                                    <td width = '300px'><?php echo $rezultat['odgovori'];?></td><td width = '100px'><?php echo $rezultat['rezultat'];?></td>
                                    <td><?php echo form_checkbox('cbBrisi[]', $rezultat['id_rezultat']); ?></td>
                                </tr>
                                <?php endforeach;?>
                            </table>
                            <?php echo form_submit('btnBrisi', 'Brisi'); ?>
                            <?php 
                                echo form_close(); 
                                if(isset($status))
                                {
                                    redirect(base_url()."anketa/adminRezultati/delete");                                   
                                }
                                echo anchor("admin","Admin strana");
                            ?>                            			                                                              
			</div>
		</div>		
		
	</div>

