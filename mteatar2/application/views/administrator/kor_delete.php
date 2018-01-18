<div id="contents">			
    <div class="highlight">
        <div class="clearfix">
            <?php echo form_open_multipart("korisnici/adminKorisnici/delete", array('class' => 'message')); ?>                
                <table border = '1'>
                    <?php foreach ($korisnici as $korisnik):?>
                    <tr>
                        <td width = '20px'><?php echo $korisnik['id_admin'];?></td><td width = '300px'> <?php echo $korisnik['naziv_admin'];?> </td>
                        </td><td width = '300px'> <?php echo $korisnik['lozinka'];?> </td>
                        <td width = '300px'> <?php echo $korisnik['email'];?></td>
                        <td> <?php echo form_checkbox('cbBrisi[]', $korisnik['id_admin']); ?> </td>
                    </tr>
                    <?php endforeach;?>
                </table>
                <?php echo form_submit("btnBrisi", "Brisi");?>
                <p><h4>Prikaz brisanih korisnika:</h4></p>
                <table border = '1'>
                    <?php foreach ($brisaniKorisnici as $bk):?>
                    <tr>
                        <td width = '20px'><?php echo $bk['id_admin'];?></td><td width = '300px'> <?php echo $bk['naziv_admin'];?> </td>
                        </td><td width = '300px'> <?php echo $bk['lozinka'];?> </td>
                        <td width = '300px'> <?php echo $bk['email'];?></td>
                        <td> <?php echo form_checkbox('cbVrati[]', $bk['id_admin']); ?> </td>
                    </tr>
                    <?php endforeach;?>
                </table>
                <?php echo form_submit("btnIzmena", "Izmeni");?>
                <?php                  
                    echo form_close(); 
                    if(isset($status))
                    {
                        redirect(base_url()."korisnici/adminKorisnici/delete");                                   
                    }
                    echo anchor("admin","Admin strana");
                ?>                            		
        </div>
    </div>
</div>

