
<header >
<body > 
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                     
                       <div align="center"> <h1><?=$Post?></h1></div>
                        <hr class="small">
                     
                      <h4>  <span class="subheading"><?=$Descripcion?> <br> <?=$Fecha?></span></h4>
                      <?php if ($Imagen != NULL){?>
                     <img src="/public/img/<?php echo $Imagen?>" width = 750 height =350>
                   <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        </body>
    </header>   
