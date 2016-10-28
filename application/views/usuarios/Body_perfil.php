
 <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div align="center"> <B><h3>Tus posts</h3></B></div>
                   <?php
                   foreach ($Consulta as $Fila) {
                   ?>
                    <h5> <?=$Fila->titulo_post?></h5>
                    <h5> <?=$Fila->cont_post?></h5>
                    <h5> <?=$Fila->fecha_post?></h5>
                    <hr color="blue" size=3>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
    </article>
