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
                <div class="error">
                <?php
                echo $this->session->flashdata('error');
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
                'style'=> 'width:50%',
                'required');
                echo "<br>Titulo: <br>";
                echo form_input($Data);
                ?>
                <div style="width: 708px">
                <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
                <script>tinymce.init({ selector:'textarea' });</script>
                <?php
                 $Data= array
                (
                'name' =>  'contenido',
                'id' => 'contenido',
                'size' => '50',
                'style' => 'width:40%',
                'required');

                echo "<br>Contenido: <br>";
            	echo form_textarea('contenido','');   //CONTENIDO             
                ?>
                </div>
                <?php

            	echo "<br>";
                $Data=  array(
                    'name' => 'Imagen',
                    'id' =>'Imagen');
            	echo form_upload($Data);//IMAGEN
            	echo "<br>";
            	echo form_submit('postear','   Crear Post   ');//BOTON
            	echo form_close();
            	?>
</div>
            </div>
        </div>
</div>
