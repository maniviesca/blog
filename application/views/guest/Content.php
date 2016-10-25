
    
<div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?php
            foreach ($consulta->result() as $Fila) {
            ?>
            <div class="post-preview">
            <a href="<?=base_url()?>post/<?=$Fila->id_post?>">
                    <h2 class="post-title">
                        <?=$Fila->titulo_post?>
                    </h2>
                    <h3 class="post-subtitle">
                        <?=$Fila->cont_post?>
                    </h3>
            </a>
                    <p class="post-meta">Posted by <?=$Fila->autor_post?></a> on <?=$Fila->fecha_post?></p>
                </div>
                <hr>
            <?php
                }
            ?>
                <?php 
                echo $pagination 
                ?>
            </div>
        </div>
    </div>
    <hr>