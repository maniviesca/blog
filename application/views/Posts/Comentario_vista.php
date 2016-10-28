 <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                  <div align="center"> <B><h3>Comentarios</h3></B></div>
                   <?php
                   foreach ($Consulta as $Comentarios) {
                   ?>
                    <h5>Titulo: <?=$Comentarios->titulo_comentario?></h5>
                    <h5>Contenido: <?=$Comentarios->cont_comentario?></h5>
                    <h5>Por: <?=$Comentarios->nom_usuario?></h5>
                    <hr color="blue" size=3>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
    </article>
