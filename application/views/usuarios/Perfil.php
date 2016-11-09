<header class="intro-header" style="background-image: url('plantilla/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
             <style type="text/css">
                 .mensaje{
                    color:blue;
                    text-align: center;
                 }   
                </style>
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                       <div align="center"> <h1><?=$Post?></h1></div>
                        <div align="center"><h1><?=$Usuario?></h1></div>
                        <hr class="small">
                        <div align="center"><span class="subheading"><?=$Descripcion?></span></div>
                        <div class="mensaje">
                        <h3>
                <?php
                echo $this->session->flashdata('posteado');
                echo $this->session->flashdata('correcto');
                echo $this->session->flashdata('eliminado');
                ?>
                </h3>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </header>



