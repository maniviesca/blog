<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  ?><!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <style type="text/css">
      .error{
      color: red;
      }
    </style>
  </head>
  <body>
    <div class="error">
      <?php echo validation_errors(); ?>
    </div>
    <?php echo form_open('formulario/procesar'); ?>
    <h5>Nombre de usuario</h5>
    <input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />
    <h5>Password</h5>
    <input type="text" name="password" value="<?php echo set_value('password'); ?>" size="50" />
    <h5>Confirmar Password</h5>
    <input type="text" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />
    <h5>Email</h5>
    <input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />
    <div><input type="submit" value="Submit" /></div>
    </form>
  </body>
</html>