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
                //echo $this->session->flashdata('verificar');
                $nombre = $this->session->tempdata('nombre');
                if($nombre)
                {echo "<div class= 'alert alert-warning'> 
                <a href='verificar' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>$nombre;</strong> 
              </div>";
                }
                 $apellido = $this->session->tempdata('apellido');
                if($apellido)
                {echo "<div class= 'alert alert-warning'> 
                <a href='verificar' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>$apellido;</strong> 
              </div>";
                }
                 $respuestauno = $this->session->tempdata('respuestauno');
                if($respuestauno)
                {echo "<div class= 'alert alert-warning'> 
                <a href='verificar' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>$respuestauno;</strong> 
              </div>";
                }
                  $respuestados = $this->session->tempdata('respuestados');
                if($respuestados)
                {echo "<div class= 'alert alert-warning'> 
                <a href='verificar' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>$respuestados;</strong> 
              </div>";
                }
                //echo $this->session->flashdata('nombre');
                //echo "<br>";
               // echo $this->session->flashdata('apellido');
                //echo $this->session->flashdata('respuestauno');
                //echo $this->session->flashdata('respuestados');
                 ?> 
                </div>
                    <div class="site-heading">
                  <?php echo form_open_multipart('Contenido/verificar'); 
                  echo form_hidden('correo',$correo)
                  ?>
                    <h4>Nombre:</h4>
                        <?php echo form_input('name',$this->session->flashdata('nombre_form')); ?>
                    <h4>Apellido:</h4>
                       <?php echo form_input('lastname',$this->session->flashdata('apellido_form')); ?>


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
                    echo form_input('respuestauno',$this->session->flashdata('uno_form'));
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
                    echo form_input('respuestados',$this->session->flashdata('dos_form'));
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