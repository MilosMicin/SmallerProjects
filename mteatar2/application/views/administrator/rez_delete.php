<script>
    
</script>
<div id="contents">			
    <div class="highlight">
        <div class="clearfix">     
            <?php echo form_open("admin/upravljanje_rezervacijama/delete"); ?>
                <table width ="100%" border = "1" >   
                    <?php foreach ($rezervacije as $rez):?>           
                        <tr>
                            <td width="20px"><?php echo $rez['id_korisnik']?></td>
                            <td width="200px"><?php echo $rez['ime']?></td>
                            <td width="200px"><?php echo $rez['email']?></td>
                            <td width="200px"><?php echo $rez['naziv_pozoriste']?></td>
                            <td width="200px"><?php echo $rez['naziv_predstava']?></td>
                            <td><input type = 'checkbox' name = 'id[]' value="<?php echo $rez["id_korisnik"]?>"</td>
                        </tr>                          
                    <?php 
                        endforeach; 
                        echo form_close(); 
                        if(isset($status))
                        {
                            redirect(base_url()."admin/upravljanje_rezervacijama/delete");                                   
                        }
                    ?>
                </table> 
                <input type="submit" value="Briši" />
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
