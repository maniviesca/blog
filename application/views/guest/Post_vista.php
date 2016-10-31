 <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                   <h3><p><?=$Contenido?></p></h3>

                   <?php
                if ($this->session->userdata('login')){
                 	# code...
                 
                   if( $this->session->userdata['login']['nom_usuario'] == $Usuario){
                 	 echo form_open_multipart('Contenido/eliminar');
                 	 echo form_hidden('id_post',$this->uri->segment(2));

                   ?>
                   <input type="submit" value = "eliminar" name="eliminar">
                   
                  <?php
                  echo form_close();
                   }
               }
                   ?>
                </div>
            </div>
        </div>
    </article>
