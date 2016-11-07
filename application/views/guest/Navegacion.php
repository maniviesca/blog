<body>

    
   
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <a class="navbar-brand" href="http://blog.com/">INICIO</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    
                    
                    <?php if ($this->session->userdata('login')){?>
                    <li> 
                        <a href="<?=base_url()?>Perfil/index">Perfil</a> 
                    </li>
                    <li> 
                        <a href="<?=base_url()?>Login/logout">Cerrar sesion</a> 
                    </li>
                    
                    <?php
                             } else {
                      ?>
                    <!--<li> <a href="<?= base_url()?>Postear">Postear</a> </li>-->
                  
                    <li> <a href="<?= base_url()?>Registrar/index">Registrarse</a> </li>
                    <li class='dropdown'>
                      <a class='dropdown-toggle' href='#' data-toggle='dropdown' style="background: none;">Iniciar sesion <strong class='caret'></strong></a>
                      <div class='dropdown-menu' style='padding: 10px; padding-bottom: 0px; background: none; width: 400px;'>
                        <form action="<?=base_url()?>Login" method='post' accept-charset='UTF-8' role="form">
                          <div class='form-group'>
                            <input class='form-control large' style='text-align: center;' type='email' name='email' placeholder='email'/>
                          </div>
                          <div class='form-group'>
                            <input class='form-control large' style='text-align: center;' type='password' name='password' placeholder='contraseña'/>
                          </div>
                          <div><a href="<?=base_url()?>Contenido/password" >Olvide mi contraseña</a></div>
                          <div class='form-group'>
                            <button class='btn btn-primary' style='width: 380px;' type='submit'>INGRESAR</button>
                          </div>
                          </form>
                      </div>
                    </li>
                  
                    <?php }?>
                </ul>
            </div>
                
        </div>
        
    </nav>
