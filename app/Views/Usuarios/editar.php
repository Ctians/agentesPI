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
      <form method="POST" action="<?php echo base_url() ?>/Usuarios/actualizar" autocomplete="off">
          <div class="card card-default">
              <div class="card-header">
                  <h3 class="card-title">Usuarios</h3>
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
                  <input type="hidden" value="<?php echo $datos['id_usuarios']; ?>" name="id_usuarios">
                  <div class="form-group">
                      <div class="row">
                          <div class="col-12 col-sm-6">
                              <label>Correo Electrónico</label>
                              <input type="text" class="form-control" id="correo" name="correo" placeholder="Ingrese Correo Electrónico" value="<?php echo $datos['correo']; ?>" autofocus disabled>
                              <!-- /.form-group -->
                          </div>
                          <div class="col-12 col-sm-6">
                              <label>Rol</label>
                              <select id="id_rol" class="form-control" name="id_rol" required>
                                  <option value="">Seleccione</option>
                                  <?php foreach ($roles as $roles1) { ?>
                                      <option value="<?php echo $roles1['id_rol']; ?>" <?php if ($roles1['id_rol'] == $datos['id_rol']) {
                                                                                                        echo 'selected';
                                                                                                    } ?>><?php echo $roles1['nombre']; ?></option>
                                  <?php } ?>
                              </select>
                          </div>
                          <div style="color: red;">
                                  <?= $error = $validation->getError('id_rol'); ?>
                              </div>
                      </div>
                  </div>
                  <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label>Contraseña</label>
                                          <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password') ?>" placeholder="Ingrese la contraseña" autofocus>
                                          <!-- /.form-group -->
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('password'); ?>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label>Confirmar Contraseña</label>
                                          <input type="password" class="form-control" id="repassword" name="repassword" value="<?php echo set_value('repassword') ?>" placeholder="Confirme la contraseña" autofocus>
                                          <!-- /.form-group -->
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('repassword'); ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                  <!-- /.row -->
                  <a href="<?php echo base_url() ?>/usuarios" class="btn btn-primary">Volver</a>
                  <button class="btn btn-success" type="submit">Guardar</button>
              </div>
              <!-- /.card-body -->
          </div>
      </form>