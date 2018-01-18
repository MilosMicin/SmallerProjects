<?php
$q = "style = 'height: 24px;width: 590px;margin: 0 0 18px;padding: 0 4px;'";
?>
<div id="contents">			
    <div class="highlight">
        <div class="clearfix">
            <?php echo form_open_multipart("korisnici/adminKorisnici/update", array('class' => 'message')); ?>
                <table>    
                    <tr>
                        <td><?php echo form_label("ID:", "lID"); ?></td>                                                                                                     
                    </tr>
                    <tr>                                        
                        <td><?php echo form_input("tbId"); ?></td>                                          
                    </tr>
                    <tr>
                        <td><?php echo form_label("Ime:", "lIme"); ?></td>                                                                                                     
                    </tr>
                    <tr>                                        
                        <td><?php echo form_input("tbNaziv"); ?></td>                                          
                    </tr>
                    <tr>
                        <td><?php echo form_label("Lozinka:", "lLozinka"); ?> </td>                                                                                                     
                    </tr>
                    <tr>                                        
                        <td><?php echo form_password("tbLozinka",'',$q); ?></td>                                          
                    </tr>
                    <tr>
                        <td><?php echo form_label("Email:", "lEmail"); ?></td>                                                                                                     
                    </tr>
                    <tr>                                        
                        <td><?php echo form_input("tbEmail"); ?></td>                                          
                    </tr>
                    <tr>
                        <td><input type="submit" value="Unesi" name = "btnUnos" /></td>
                    </tr>
                </table>

                <table border = '1'>
                    <?php foreach ($korisnici as $korisnik):?>
                    <tr>
                        <td width = '20px'><?php echo $korisnik['id_admin'];?></td><td width = '300px'> <?php echo $korisnik['naziv_admin'];?> </td>
                        </td><td width = '300px'> <?php echo $korisnik['lozinka'];?> </td>
                        </td><td width = '300px'> <?php echo $korisnik['email'];?></td>
                    </tr>
                    <?php endforeach;?>
                </table>
                <?php 
                    echo form_close(); 
                    if(isset($status))
                    {
                        redirect(base_url()."korisnici/adminKorisnici/update");                                   
                    }
                    echo anchor("admin","Admin strana");
                ?>                            		
        </div>
    </div>
</div>

