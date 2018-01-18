<div id="contents">			
    <div class="highlight">
        <div class="clearfix">
            <p><h2>Registracija</h2></p>
            <?php echo form_open("logovanje/registracija"/*, array('class' => 'message')*/); ?>    
                <table>
                    <tr><td><?php echo form_label("Kor ime:", "lUser");?></td></tr>
                    <tr>                       
                        <td><?php echo form_input(array('name' => 'tbUser', 'id' => 'tbUser'));?></td>
                    </tr>
                    <tr><td><?php echo form_label("Lozinka:", "lLozinka");?></td></tr>
                    <tr>                       
                        <td><?php echo form_password(array('name' => 'tbLozinka', 'id' => 'tbLozinka', 'style' => 'height: 24px;width: 590px;margin: 0 0 18px;padding: 0 4px;'));?></td>
                    </tr>
                    <tr><td><?php echo form_label("Email:", "lEmail");?></td></tr>
                    <tr>                       
                        <td><?php echo form_input(array('name' => 'tbEmail', 'id' => 'tbEmail'));?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><?php echo form_submit(array('name' => 'btnRegistracija', 'id' => 'btnRegistracija',  'value' => 'Registruj se'));?></td>
                    </tr>
                    
                </table>
            <?php 
                echo form_close();               
                echo validation_errors();
            ?>           
        </div>
    </div>
</div>

