<?php
    $pozoristaItem = array('#' => 'Izaberi...');
    foreach($pozoriste as $poz):
        $pozoristaItem[$poz['id_pozoriste']] = $poz['naziv_pozoriste'];
    endforeach;
    
    $predstaveItem = array('#' => 'Izaberi...');
    foreach($predstava as $pre):
        $predstaveItem[$pre['id_predstava']] = $pre['naziv_predstava'];
    endforeach;
    $q = "style = 'height: 24px;width: 590px;margin: 0 0 18px;padding: 0 4px;'";
?>
<div id="contents">			
    <div class="highlight">
        <div class="clearfix">     
            <?php echo form_open("admin/upravljanje_rezervacijama/update", array('class' => 'message')); ?>
            <table>
                <tr>
                    <td><?php echo form_label("Id:", "lId"); ?></td>
                </tr>
                <tr>
                    <td><?php echo form_input("tbId"); ?></td>
                </tr>
                <tr>
                    <td><?php echo form_label("Email:", "lEmail"); ?></td>
                </tr>
                <tr>
                    <td><?php echo form_input("tbEmail"); ?></td>
                </tr>
                <tr>
                    <td><?php echo form_label("Ime:", "lIme"); ?></td>                                                                                                     
                </tr>
                <tr>                                        
                    <td><?php echo form_input("tbIme"); ?></td>                                          
                </tr>               
                <tr>
                    <td><?php echo form_label("Pozoriste:", "lPozoriste"); ?></td>
                </tr>
                <tr>
                    <td style="padding-bottom: 15px;"><?php echo form_dropdown("ddlPozoriste", $pozoristaItem,'',$q); ?></td>
                </tr>
                <tr>
                    <td><?php echo form_label("Predstava:", "lPredstava"); ?></td>
                </tr>
                <tr>                   
                    <td style="padding-bottom: 15px;"><?php echo form_dropdown("ddlPredstava", $predstaveItem,'',$q); ?></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Unesi" name = "btnUpdate" /></td>
                </tr>
            </table>
            <?php echo form_close(); ?>
            <table width ="100%" border = "1" >   
                <?php foreach ($rezervacije as $rez):?>           
                    <tr>
                        <td width="20px"><?php echo $rez['id_korisnik']?></td>
                        <td width="200px"><?php echo $rez['ime']?></td>
                        <td width="200px"><?php echo $rez['email']?></td>
                        <td width="200px"><?php echo $rez['naziv_pozoriste']?></td>
                        <td width="200px"><?php echo $rez['naziv_predstava']?></td>                           
                    </tr>                          
                <?php 
                    endforeach;
                    if(isset($status))
                    {
                        redirect(base_url()."admin/upravljanje_rezervacijama/delete");                                   
                    }
                ?>
            </table>                          
        </div>
    </div>
</div>
