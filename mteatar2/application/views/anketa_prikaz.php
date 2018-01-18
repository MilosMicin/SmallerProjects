<div id="contents">			
    <div class="highlight">
        <div class="clearfix">
            <?php echo form_open(); ?>
            <table>
                <tr>
                    <td>
                        <?php
                            foreach ($ankete as $anketa):
                                echo $anketa['pitanje'];
                            endforeach;
                        ?>
                    </td>
                </tr>                                
            </table>
            <?php echo form_close(); ?>
            
        </div>
    </div>
</div>
