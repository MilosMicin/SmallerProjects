<div id="contents">			
    <div class="highlight">
        <div class="clearfix">
            <p><h2>Anketa</h2></p>
            <?php echo form_open(); ?>
            
            <table>
                <?php foreach ($ankete as $anketa):?>
                <tr>
                    <td>
                        <?php
                            //foreach ($ankete as $anketa):
                                echo $anketa['pitanje'];
                            //endforeach;
                        ?>
                    </td>
                    
                </tr> 
                
                <?php foreach ($odgovori as $odgovor):?>
                <tr>                    
                    <td>                        
                        <?php echo form_radio('rbOdgovori', $odgovor['id_odgovori']); echo $odgovor['odgovori']; ?>  
                    </td>    
                    
                </tr>
                <?php endforeach; ?>
                <?php endforeach; ?>
                <tr>
                    <td>
                        <?php 
                            echo validation_errors();
                            if(isset($uspesno))
                            {
                                echo $uspesno;
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td> <?php echo form_submit('btnOdgovor', 'Odgovor');?> </td>
                </tr>                
            </table>
            <?php echo form_close(); ?>
            
        </div>
    </div>
</div>
