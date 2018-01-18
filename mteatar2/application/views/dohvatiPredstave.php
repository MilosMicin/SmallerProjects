<?php
    $predstavaItem = array('#' => 'Izaberi...');
    foreach($ajax_predstava as $ap):
        $predstavaItem[$ap['id_predstava']] = $ap['naziv_predstava'];
    endforeach;
    
    echo form_dropdown('ddlPredstava', $predstavaItem);
?>

