
<header background="/plantilla/img/home-bg.jpg" >

        <div class="container">
            <div class="row">
<style type="text/css">
             .error{
                    color:red;
                 } 
                 </style>
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                <div class="error">
                <?php
                echo $this->session->flashdata('login');
                ?>
                </div>


                      <font size="20"><div align="center"> <?=$Post?></div></font>
                        <hr class="small">
                          <div align="center"><span class="subheading"><?=$Descripcion?></span></div>
                    </div>
                </div>
            </div>
        </div>
       
    </header>


