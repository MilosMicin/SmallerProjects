<div id="footer">
		<div class="clearfix">
			<div class="section">
				<h4>Latest News</h4>
				<p>
					This website template has been designed by Free Website Templates for you, for free. You can replace all this text with your own text. You can remove any link.
				</p>
			</div>
			<div class="section contact">
				<h4>Contact Us</h4>
				<p>
					<span>Address:</span> the address city, state 1111
				</p>
				<p>
					<span>Phone:</span> (+20) 000 222 999
				</p>
				<p>
					<span>Email:</span> info@freewebsitetemplates.com
				</p>
			</div>
			<div class="section">
				<h4>Logovanje:</h4>		
                                
                                <?php 
                                    $session = $this->session->userdata("ulogovan");
                                    if(!empty($session) && $session)
                                    {
                                        echo anchor("logovanje/logout", "Izloguj se");
                                    }
                                    else
                                    {                                                                            
                                    echo form_open('Logovanje/login'); 
                                ?>
                                <table>
                                    <tr>
                                        <td><?php echo form_label("Kor ime:", "lUser");?></td>
                                        <td><?php echo form_input(array('name' => 'tbUser', 'id' => 'tbUser'));?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo form_label("Lozinka:", "lLozinka");?></td>
                                        <td><?php echo form_password(array('name' => 'tbLozinka', 'id' => 'tbLozinka'));?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><?php echo form_submit(array('name' => 'btnLogin', 'id' => 'btnLogin',  'value' => 'Login'));?></td>
                                    </tr>                                   
                                </table>
                                    <?php 
                                        echo form_close(); 
                                    }
                                    ?>                                   
                                    
			</div>
		</div>
		<div id="footnote">
			<div class="clearfix">
				<div class="connect">
					<a href="http://freewebsitetemplates.com/go/facebook/" class="facebook"></a><a href="http://freewebsitetemplates.com/go/twitter/" class="twitter"></a><a href="http://freewebsitetemplates.com/go/googleplus/" class="googleplus"></a><a href="http://pinterest.com/fwtemplates/" class="pinterest"></a>
				</div>
				<p>
					© Copyright 2023 Manes Winchester. All Rights Reserved.
				</p>
			</div>
		</div>
	</div>
</body>
</html>

