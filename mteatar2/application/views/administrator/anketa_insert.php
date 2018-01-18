
<div id="contents">			
		<div class="highlight">
                        <div class="clearfix">
                            <?php echo form_open_multipart("anketa/adminAnketa/insert_anketa"/*, array('class' => 'message')*/); ?>
                            <table>                                
                                <tr>
                                    <td><?php echo form_label("Pitanje:", "lpitanje"); ?></td>                                                                                                     
                                </tr>
                                <tr>                                        
                                    <td><?php echo form_input("tbPitanje"); ?></td>                                          
                                </tr>
                                <tr>
                                    <td><input type="submit" value="Unesi" name = "btnUnos" /></td>
                                </tr>
                            </table>
                            
                            <table border = '1'>
                                <?php foreach ($ankete as $anketa):?>
                                <tr>
                                    <td width = '20px'><?php echo $anketa['id_anketa'];?></td><td width = '300px'><?php echo $anketa['pitanje'];?></td>
                                </tr>
                                <?php endforeach;?>
                            </table>
                            <?php 
                                echo form_close(); 
                                if(isset($status))
                                {
                                    redirect(base_url()."anketa/adminAnketa/insert_anketa");                                   
                                }
                                echo anchor("admin","Admin strana");
                            ?>                            			                                                              
			</div>
		</div>		
		
	</div>

