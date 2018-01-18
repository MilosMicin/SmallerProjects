
<div id="contents">			
		<div class="highlight">
                        <div class="clearfix">
                            <?php echo form_open_multipart("anketa/adminAnketa/delete_anketa"/*, array('class' => 'message')*/); ?>                                                       
                            <table border = '1'>
                                <?php foreach ($dankete as $danketa):?>
                                <tr>
                                    <td width = '20px'><?php echo $danketa['id_anketa'];?></td><td width = '300px'><?php echo $danketa['pitanje'];?></td>
                                    <td><?php echo form_checkbox('cbBrisi[]', $danketa['id_anketa']); ?></td>
                                </tr> 
                                <?php endforeach;?>
                            </table><br/>
                            <?php echo form_submit("btnBrisi", "Brisanje"); ?>
                            <p><h3>Vratite anketu:</h3><p/>
                            <table border = '1'>
                                <?php foreach ($brisaneAnkete as $brisanaAnketa):?>
                                <tr>
                                    <td width = '20px'><?php echo $brisanaAnketa['id_anketa'];?></td><td width = '300px'><?php echo $brisanaAnketa['pitanje'];?></td>
                                    <td><?php echo form_checkbox('cbVrati[]', $brisanaAnketa['id_anketa']); ?></td>
                                </tr> 
                                <?php endforeach;?>
                            </table>
                            <?php echo form_submit("btnVracanje", "Vracanje"); ?>
                            <?php 
                                echo form_close(); 
                                if(isset($status))
                                {
                                    redirect(base_url()."anketa/adminAnketa/delete_anketa");                                   
                                }
                                echo anchor("admin","Admin strana");
                            ?>                            			                                                              
			</div>
		</div>		
		
	</div>

