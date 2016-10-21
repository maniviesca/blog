<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            	
            	<?php
            	echo form_open_multipart('Contenido/insert');
            	echo "<br>Ingresa el titulo del post <br>";
            	echo form_input('titulo','');
            	//echo "<br>Ingresa el contenido del post <br>";
            	echo form_input_textarea('contenido','Ingresa el contenido del post');
            	echo "<br>";
            	echo form_input_file('Selecciona una imagen');
            	echo "Autor:<br>";
            	echo form_input('autor','');
            	echo "<br>";
            	echo form_submit('postear','   Crear Post   ');
            	echo form_close();
            	?>

            </div>
        </div>
</div>
