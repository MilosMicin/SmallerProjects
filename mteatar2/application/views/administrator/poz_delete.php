<div id="contents">			
    <div class="highlight">
        <div class="clearfix">
            <?php echo form_open_multipart("admin/upravljanje_pozoristima/delete"/*, array('class' => 'message')*/); ?>                
                <table border = '1'>
                    <?php foreach ($pozorista as $pozoriste):?>
                    <tr>
                        <td width = '20px'><?php echo $pozoriste['id_pozoriste'];?></td><td width = '300px'><?php echo $pozoriste['naziv_pozoriste'];?></td>
                        <td><?php echo form_checkbox("chBrisi[]", $pozoriste['id_pozoriste'])?></td>
                    </tr>
                    <?php endforeach;?>
                </table>
                <?php 
                    echo form_submit("btnBrisi", "Brisanje");
                    echo form_close(); 
                    if(isset($status))
                    {
                        redirect(base_url()."admin/upravljanje_pozoristima/delete");                                   
                    }
                    echo anchor("admin","Admin strana");
                ?>                            		
        </div>
    </div>
</div>

