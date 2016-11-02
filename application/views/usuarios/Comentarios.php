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
            	echo form_open_multipart('Contenido/comment');
            	
                echo "<br>Titulo:<br>";
            	echo form_input('titulo','');
                echo "<br>";
                echo "<br>Contenido:";
            	echo form_input_textarea('contenido','');
            	//echo "<br>";
            	echo form_submit('comentar','          Comentar         ');
            	echo form_hidden('id_post',$this->uri->segment(3));
                echo form_close();
            	?>

            </div>
        </div>
</div>
