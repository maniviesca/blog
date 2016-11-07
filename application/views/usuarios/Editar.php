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
                <div class="btn-toolbar">

                <?php
                echo form_open_multipart('Contenido/actualizar');//TITULO
              
                echo form_hidden('id_post',$Id);

                $Data= array
                (
                'name' =>  'titulo',
                'id' => 'titulo',
                'maxlength' => '200',
                'size' => '50'    ,
                'style'=> 'width:40%',
                'required');
                echo "<br>Titulo: <br>";
                echo form_input($Data,$Titulo);

                echo "<br>";
                echo "<br>Contenido: <br>";
                echo form_textarea('contenido',$Contenido);   //CONTENIDO             
               echo "<br>";
                $Data=  array(
                    'name' => 'Imagen',
                    'id' =>'Imagen');
                echo form_upload($Data);//IMAGEN
                ?>
                 <img src="/public/img/<?php echo $Imagen?>" width = 200 height =150>
                <?php
                echo "<br>";
                echo form_submit('actualizar','   Actualizar post   ');//BOTON
                echo form_close();
                ?>

            </div>
        </div>
</div>
