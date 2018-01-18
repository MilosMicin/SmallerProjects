<script>
    $(document).ready(function(){
        $("#ddlPozoriste").change(function(){
            var izbor = $("#ddlPozoriste").val(); 
            $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>pocetna/predstava_ajax/"+izbor,
                success: function(data){
                        $("#ddlPredstava").html(data);
                }
            });
        });
    });   
</script>
<?php
    $pozoristaItem = array('#' => 'Izaberi...');
    foreach($pozoriste as $poz):
        $pozoristaItem[$poz['id_pozoriste']] = $poz['naziv_pozoriste'];
    endforeach;
    
    $predstavaItem = array('#' => 'Izaberi...');
    
    $q = 'id="ddlPozoriste" style = "padding: 0 4px; height: 24px; width: 590px; margin: 0 0 18px;"';
    $q2 = 'id="ddlPredstava" style = "padding: 0 4px; height: 24px; width: 590px; margin: 0 0 18px;"';
    
?>
<div id="contents">			
    <div class="highlight">
        <div class="clearfix">
            <h1>Rezervacije</h1>
            <?php echo form_open("pocetna/rezervacije"); ?>
            <table>
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
                    <td style="padding-bottom: 15px;"><?php echo form_dropdown("ddlPredstava", $predstavaItem,'',$q2); ?></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Unesi" name = "btnUnos" /></td>
                </tr>
            </table>
            <?php 
                echo form_close(); 
                echo validation_errors();
                if(isset($uspesno))
                {
                    redirect('anketa');
                }
            ?>
        </div>
    </div>
</div>
