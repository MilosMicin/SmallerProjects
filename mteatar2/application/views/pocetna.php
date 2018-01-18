<div id="contents">
		<div id = "velikaSlika">
			<div class="clearfix">	
				<div class="slajd">
					<img style = "padding:0 0 0 150px;" src="<?php echo base_url();?>images/big-slika.jpg" alt="Img" height="382" width="700" class="prvi"/>   
					<img style = "padding:0 0 0 150px;" src="<?php echo base_url();?>images/big-slika1.jpg" alt="Img" height="382" width="700" />
					<img style = "padding:0 0 0 150px;" src="<?php echo base_url();?>images/big-slika2.jpg" alt="Img" height="382" width="700" />
				</div>
			</div>
		</div>	
		<div class="highlight">
			<div class="clearfix">
				<div class="testimonial">
                                        <?php
                                            $session = $this->session->userdata("ulogovan");
                                            if(!empty($session) && $session)
                                            {
                                                echo"<h2>".  anchor('anketa','Anketa')."</h2>";
                                            }
                                            else
                                            {                                                                                           
                                        ?>
					<h2><?php echo anchor('logovanje/registracija','Registracija');?></h2>
                                        <?php }?>
					<p>
						&ldquo;Aenean ullamcorper purus vitae nisl tristique sollicitudin. Quisque vestibulum, erat ornare.&rdquo;
					</p>
                                        <span><b><?php echo anchor('pocetna/autor','O autoru');?></b></span>
				</div>
				<h1>Daske koje život znače</h1>
				<p>
					Ovaj sajt je mesto za sve ljubitelje kultute. Ovde lako možete naručiti kartu za neku od vaših omiljenih predstava u nekom od vaših omiljenih pozorišta. Mi ćemo sve učiniti da kulturno nasledje koje vam je ostavljeno bude za vas i prikazano.
				</p>
			</div>
		</div>		
		<div class="featured">
			<h2>Zašto izabrati nas?</h2>
			<ul class="clearfix">
				<li>
					<div class="frame1">
						<div class="box">
                                                    <img src="<?php echo base_url();?>images/min-predstava.jpg" alt="Img" height="130" width="197">
						</div>
					</div>
					<p>
						<b>Najbolje predstave</b> Naš kvalitet predstava je najbolji na celom balkanu.
					</p>
				</li>
				<li>
					<div class="frame1">
						<div class="box">
							<img src="<?php echo base_url();?>images/min-publika.jpg" alt="Img" height="130" width="197">
						</div>
					</div>
					<p>
						<b>Najbolja zajednica</b> Naši članovi vas uvek mogu posavetovati šta da gledate.
					</p>					
				</li>
				<li>
					<div class="frame1">
						<div class="box">
							<img src="<?php echo base_url();?>images/min-glumac.jpg" alt="Img" height="130" width="197">
						</div>
					</div>
					<p>
						<b>Nasi glumci</b> Glumacke legende srpskog i jugoslovenskog pozorištva učestvuju u našoj komuni i pridodaju doživljaju.
					</p>					
				</li>
				<li>
					<div class="frame1">
						<div class="box">
							<img src="<?php echo base_url();?>images/min-pozoriste.jpg" alt="Img" height="130" width="197">
						</div>
					</div>
					<p>
						<b>Klasične sale</b> Naše sale pridodaju nostalgiji za prošlim vremenima kada je kultura bila na vrhuncu sveta.
					</p>				
				</li>
			</ul>
		</div>
	</div>

