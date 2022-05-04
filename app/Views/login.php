<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Iniciar sesión</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/dist/css/adminlte.min.css">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>/logo.png">
</head>
<style>
  .slider {
    background: url(<?php echo base_url(); ?>/Fondo.png) no-repeat center/cover;
    font-family: 'helvetica', sans-serif;
  }
</style>

<body class="slider hold-transition login-page"><br><br>
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="<?php echo base_url(); ?>" class="h1">
          <img src="<?php echo base_url(); ?>/logo.png" alt="">
          <br>
          <b>Agentes</b>PI</a>
      </div>
      <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <form id="form-login" action="<?php echo base_url(); ?>/usuarios/valida" method="post">
          <?php csrf_field(); ?>
          <div class="input-group mb-3">
            <input type="email" id="correo" name="correo" class="form-control" placeholder="Ingresa Correo Electrónico">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa contraseña">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div style="color: red;">
            <?= $error1 = $validation->getError('correo'); ?>
          </div>
          <div style="color: red;">
            <?= $error1 = $validation->getError('password'); ?>
          </div>
          <?php if (isset($error)) { ?>
            <div style="color: red;">
              <?php echo $error; ?>
            </div>
          <?php } ?>
          <br>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="button" id="iniciar" class="btn btn-primary btn-block">Iniciar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <br>
        <p class="mb-1">
          <a href="forgot-password.html">Olvide mi contraseña</a>
        </p>
        <p class="mb-0">
          <a href="<?php echo base_url(); ?>/Usuarios/nuevo" class="text-center">Registrarse</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>/plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>/plugins/jquery/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>/dist/js/adminlte.min.js"></script>

  <!-- Recapcha v3 -->
  <script src="https://www.google.com/recaptcha/api.js?render=6LfMi-QaAAAAABDIF48ggGPachzgoj9r849Si-mj"></script>
  <script>
    $(document).ready(function() {
      $('#iniciar').click(function() {
        grecaptcha.ready(function() {
          grecaptcha.execute('6LfMi-QaAAAAABDIF48ggGPachzgoj9r849Si-mj', {
            action: 'validarUsuario'
          }).then(function(token) {
            $('#form-login').prepend('<input type="hidden" name="token" value="' + token + '" >');
            $('#form-login').prepend('<input type="hidden" name="action" value="validarUsuario" >');
            $('#form-login').submit();
          });
        });
      })
    })
  </script>
</body>

</html>