
<div id="contents">			
		<div class="highlight">
                        <div class="clearfix">
                            <?php echo form_open("admin/upravljanje_repertoarima/delete", array('class' => 'message')); ?>                            
			    <?php foreach ($predstave as $pr):?>
                            <table border = "1" >
                                    <tr>
                                        <td width = '20px'><?php echo $pr['id_predstava']?></td>
                                        <td width = '250px'><?php echo $pr['naziv_predstava']?></td>
                                        <td width = '30px'><input type = 'checkbox' name = 'id[]' value="<?php echo $pr["id_predstava"]?>"</td>  
                                    </tr>
                            </table> 
                            <?php endforeach; ?>
                            <input type="submit" value="Briši" />
                            <?php
                                echo form_close();                              
                                if(isset($status))
                                {
                                    redirect(base_url()."admin/upravljanje_repertoarima/delete");                                    
                                }
                            ?> 
                            
			</div>
		</div>		
		
	</div>

