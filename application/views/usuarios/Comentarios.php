<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            	
            	<?php
            	echo form_open_multipart('Contenido/comment');
            	echo "<br>Usuario: <br>";
            	echo form_input('usuario','');
            	echo "<br>Titulo comentario:<br>";
            	echo form_input('titulo','');
                echo "<br>Contenido:<br>";
            	echo form_input_textarea('contenido','');
            	echo "<br>";
            	echo form_submit('comentar','   Comentar   ');
            	echo form_close();
            	?>

            </div>
        </div>
</div>
