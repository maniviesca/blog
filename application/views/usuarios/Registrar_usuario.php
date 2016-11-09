<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            	      <style type="text/css">
                 .error{
                    color:red;
                    position: relative;
                    
                 }   
                 .mensaje{
                    color: blue;
                    text-align: center;
                 }
                </style>

          <div class="error">
                 <?php
                echo validation_errors();
                 ?> 
            </div>
                <div class="btn-toolbar">   
            	<?php
            	
                echo form_open_multipart('Contenido/userInsert');
            	echo "<br>Nombre: <br>";
                  
                echo form_input('nombre','');
                echo "<br>Apellido: <br>";
                echo form_input('apellido','');
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
                echo "<br>";
                ?>
                 <div class="mensaje">
                <?php
                echo "NO OLVIDES LAS RESPUESTAS A LAS PREGUNTAS DE SEGURIDAD, YA QUE, EN CASO DE OLVIDAR LA CONTRASEÑA, ESTAS SON LA ÚNICA FORMA DE RECUPERARLA ";

                ?>
                </div>
                <?php
                echo "<br>";
                echo "Pregunta de seguridad 1:";
                echo "<br>";
                $Opciones = array(
                    'Nombre de mi primera mascota' =>'Nombre de mi primera mascota',
                    'Lugar de nacimiento de mi madre' => 'Lugar de nacimiento de mi madre',
                    'Mejor amigo de la infancia' => 'Mejor amigo de la infancia',
                    'Personaje historico favorito' =>'Personaje historico favorito',
                    'Ocupacion del abuelo' => 'Ocupacion del abuelo',
                    'Mi libro favorito' => 'Mi libro favorito'
                    );
                echo form_dropdown('pregunta_uno',$Opciones);
                echo "<br>Respuesta 1: <br>";
                echo form_input('respuesta_uno','');
                echo "<br>";
                echo "Pregunta de seguridad 2:";
                echo "<br>";
                $Opciones = array(
                    'Primer auto que tuve' =>'Primer auto que tuve',
                    'Mes de nacimiento de mi hermano' => 'Mes de nacimiento de mi hermano',
                    'Persona zurda que conozco' => 'Persona zurda que conozco',
                    'Mi canal favorito' =>'Mi canal favorito',
                    'Nombre de mi abuela paterna' => 'Nombre de mi abuela paterna'
                    );
                echo form_dropdown('pregunta_dos',$Opciones);
                echo "<br>Respuesta 2: <br>";
                echo form_input('respuesta_dos','');
                echo "<br>";
                echo "<br>";
                ?>
                <div class="error">
                <?php
                echo $this->session->flashdata('insert_user');
                ?>
                </div>
                <?php
                echo form_submit('crear','   Registrarse   ');
                
            	echo form_close();
            	?>

            </div>
        </div>
</div>
