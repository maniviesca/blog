 <article>
        <div class="container">
            <div class="row">
            <style type="text/css">
              .mensaje{
                color: blue;
              }
            </style>
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="mensaje">
                    <?php
                    echo $this->session->flashdata('comment_deleted');
                    ?>
                    </div>
                  <div align="center"> <B><h3>Comentarios</h3></B></div>
                   <?php
                   foreach ($Consulta as $Comentarios) {
                   ?>
                    <h5>Titulo: <?=$Comentarios->titulo_comentario?></h5>
                    <div style="width: 800px; word-wrap:break-word;">
                    <h5>Contenido: <?=$Comentarios->cont_comentario?></h5></div>
                    <h5>Por: <?=$Comentarios->nom_usuario?></h5>
                    <?php
                if ($this->session->userdata('login')){                 
                   if( $this->session->userdata['login']['nom_usuario'] == $Usuario){
                   echo form_open_multipart('Contenido/deleteComment');
                  echo form_hidden('id_comentario',$Comentarios->id_comentario);
                  echo form_hidden('id_post',$this->uri->segment(3));
                   ?>
                    <input type="submit" value = "eliminar" name="eliminar">
                      <?php
                    echo form_close();
                    }
                   }
                   ?>
                    <hr color="blue" size=3>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
    </article>
