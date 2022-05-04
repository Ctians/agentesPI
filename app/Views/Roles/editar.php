  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0"><?php echo $titulo; ?></h1>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <br>
      <?php $validation = \Config\Services::validation(); ?>
      <form method="POST" action="<?php echo base_url() ?>/Roles/actualizar" autocomplete="off">
          <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title">Rol</h3>
                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                      </button>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <input type="hidden" value="<?php echo $datos['id_rol']; ?>" name="id_rol">
                  <div class="form-group">
                      <div class="row">
                          <div class="col-12 col-sm-6">
                              <label for="nombre">Rol</label>
                              <input type="nombre" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Rol" value="<?php echo $datos['nombre']; ?>" autofocus>
                              <!-- /.form-group -->
                              <div style="color: red;">
                                  <?= $error = $validation->getError('nombre'); ?>
                              </div>
                          </div>
                          <!-- /.col -->
                      </div>
                  </div>
                  <!-- /.row -->
                  <a href="<?php echo base_url() ?>/roles" class="btn btn-primary">Volver</a>
                  <button class="btn btn-success" type="submit">Guardar</button>
              </div>
              <!-- /.card-body -->
          </div>
      </form>