<header >
<body > 
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                   <style type="text/css">
                 .pregunta{
                    color:blue;
                 }  
                  .error{
                    color:red;
                 }   
               
                </style>
                <div class="error">
                 <?php
                echo validation_errors();
                 ?> 
                </div>
                    <div class="site-heading">
                  <?php echo form_open_multipart('Contenido/verificar'); 
                  echo form_hidden('correo',$correo)
                  ?>
                    <h4>Nombre:</h4>
                        <?php echo form_input('name',''); ?>
                    <h4>Apellido:</h4>
                       <?php echo form_input('lastname',''); ?>


                    <h4> Pregunta 1:
                    <div class="pregunta">
                    <?php
                        echo "<br>";
                        echo $pregunta_uno;
                    ?>
                   </div>
                    </h4>
                    
                    <?php
                    echo "Respuesta:";
                    echo "<br>";
                    echo form_input('respuestauno','');
                    ?>
                     <h4>Pregunta 2:
                     <div class="pregunta">
                             <?php
                        echo "<br>";
                        echo $pregunta_dos;
                          ?>
                        </div>
                        </h4>
                        
                    <?php
                    echo "Respuesta:";
                    echo "<br>";
                    echo form_input('respuestados','');
                    echo "<br>";
                    echo "<br>";
                    echo form_submit('verificar','   Verificar   ');
                    echo form_close();
                    ?>
                    </div>
                </div>
            </div>
        </div>
        </body>
    </header>   