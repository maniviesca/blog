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
            	
                echo form_open_multipart('Contenido/insert');//TITULO
                $Data= array
                (
                'name' =>  'titulo',
                'id' => 'titulo',
                'maxlength' => '200',
                'size' => '50'    ,
                'style'=> 'width:40%');
                echo "<br>Titulo: <br>";
                echo form_input($Data);

            	echo form_input_textarea('contenido','Contenido:');   //CONTENIDO             
            	echo "<br>";

            	echo form_input_file('Selecciona una imagen');//IMAGEN
            

             /*   $Data= array
                (
                'name' =>  'autor',
                'id' => 'autor',
                'maxlength' => '200',
                'size' => '50'    ,
                'style'=> 'width:40%',);
            	echo "Autor:<br>";
            	echo form_input($Data);
            	*/echo "<br>";
            	echo form_submit('postear','   Crear Post   ');//BOTON
            	echo form_close();
            	?>

            </div>
        </div>
</div>
