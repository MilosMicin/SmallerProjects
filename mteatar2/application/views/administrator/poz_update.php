<div id="contents">			
    <div class="highlight">
        <div class="clearfix">
            <?php echo form_open_multipart("admin/upravljanje_pozoristima/update", array('class' => 'message')); ?>
                <table>  
                    <tr>
                        <td><?php echo form_label("ID:", "lID"); ?></td>                                                                                                     
                    </tr>
                    <tr>                                        
                        <td><?php echo form_input("tbId"); ?></td>                                          
                    </tr>
                    <tr>
                        <td><?php echo form_label("Pozoriste:", "lPozoriste"); ?></td>                                                                                                     
                    </tr>
                    <tr>                                        
                        <td><?php echo form_input("tbPozoriste"); ?></td>                                          
                    </tr>
                    <tr>
                        <td><input type="submit" value="Unesi" name = "btnIzmena" /></td>
                    </tr>
                </table>

                <table border = '1'>
                    <?php foreach ($pozorista as $pozoriste):?>
                    <tr>
                        <td width = '20px'><?php echo $pozoriste['id_pozoriste'];?></td><td width = '300px'><?php echo $pozoriste['naziv_pozoriste'];?></td>
                    </tr>
                    <?php endforeach;?>
                </table>
                <?php 
                    echo form_close(); 
                    if(isset($status))
                    {
                        redirect(base_url()."admin/upravljanje_pozoristima/update");                                   
                    }
                    echo anchor("admin","Admin strana");
                ?>                            		
        </div>
    </div>
</div>

