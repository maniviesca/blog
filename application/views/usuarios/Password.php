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
        echo form_open_multipart('Contenido/recuperar');
        $Data= array
                (
                'name' =>  'correo',
                'id' => 'correo',
                'maxlength' => '200',
                'size' => '50'    ,
                'style'=> 'width:40%',
                'required');
                echo "<br>Ingresa tu correo electronico: <br>";
                echo form_input($Data);
                echo form_submit('confirmar','   Confirmar   ');//BOTON
                echo form_close();
?>

         </div>
     </div>
</div>
