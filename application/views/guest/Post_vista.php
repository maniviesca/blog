 <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
<?php
                if ($this->session->userdata('login')){
        
                   if( $this->session->userdata['login']['nom_usuario'] == $Usuario){
                   echo form_open_multipart('Contenido/eliminar');
                   echo form_hidden('id_post',$this->uri->segment(3));
                   ?>
                   <input type="submit" value = "eliminar" name="eliminar"></input>
                  <?php
                  echo form_close();
                  echo form_open_multipart('Contenido/editar');
                  echo form_open_multipart('Contenido/actualizar');
                  echo form_hidden('id_post',$this->uri->segment(3));
                   ?>
                   <input type="submit" name="editar" value ="editar" href="Contenido/editar" >
                   <?php
                   echo form_close();
                 }
                   }
                   ?>
                   <h3><p><?=$Contenido?></p></h3>
                
                </div>
            </div>
        </div>
    </article>
  