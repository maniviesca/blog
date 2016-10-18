<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                
                <a class="navbar-brand" href="index.html"><?=$app?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li> <a href="<?= base_url()?>formularios/css/form.html">Comentar post</a> </li> <li> <a href="<?= base_url()?>formularios/css/post.html">Postear</a> </li>
                    <li>
                        <a href="<?= base_url()?>views/usuarios.php">Control de usuarios</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>