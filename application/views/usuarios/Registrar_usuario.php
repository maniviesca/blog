<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            	<style type="text/css">
                 .error{
                    color:red;
                 }   
                </style>

                <div class="error">
                 <?php
                 echo validation_errors();
                 ?>   
                </div>
            	<?php
            	echo form_open_multipart('Contenido/userInsert');
            	echo "<br>Usuario: <br>";
            	echo form_input('usuario','');
            	echo "<br>Contraseña:<br>";
            	echo form_password('password','');
                echo "<br>Verificar contraseña:<br>";
                echo form_password('passwordver','');
                echo "<br>";
            	echo "Email:<br>";
            	echo form_input('email','');
            	echo "<br>";
            	echo form_submit('crear','   Registrarse   ');
                
            	echo form_close();
            	?>

            </div>
        </div>
</div>
