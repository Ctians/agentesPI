<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $titulo; ?></title>

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

<body class="slider hold-transition register-page"><br><br>
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="<?php echo base_url(); ?>" class="h1">
          <img src="<?php echo base_url(); ?>/logo.png" alt="">
          <br>
          <b>Agentes</b>PI</a>
      </div>
      <div class="card-body">
        <?php $validation = \Config\Services::validation(); ?>
        <form method="POST" action="<?php echo base_url() ?>/Usuarios/insertar" autocomplete="off">
          <?php csrf_field(); ?>
          <div class="input-group mb-3">
            <input type="email" class="form-control" id="correo" name="correo" value="<?php echo set_value('correo') ?>" placeholder="Ingrese Correo Electrónico" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password') ?>" placeholder="Ingrese la contraseña" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="repassword" name="repassword" value="<?php echo set_value('repassword') ?>" placeholder="Confirme la contraseña" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div style="color: red;">
            <?= $error = $validation->getError('correo'); ?>
          </div>
          <div style="color: red;">
            <?= $error = $validation->getError('password'); ?>
          </div>
          <div style="color: red;">
            <?= $error = $validation->getError('repassword'); ?>
          </div>
          <br>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <br>
        <a href="<?php echo base_url(); ?>" class="text-center">Ya estoy registrado</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url(); ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>/dist/js/adminlte.min.js"></script>
</body>

</html>