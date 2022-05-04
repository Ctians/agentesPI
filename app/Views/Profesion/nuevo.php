  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0"><?php echo $titulo; ?></h1>
                      <br>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <br>
      <?php $validation = \Config\Services::validation(); ?>

      <div class="container-fluid">
          <div class="row mb-12">
              <div class="col-sm-12">
                  <form method="POST" action="<?php echo base_url() ?>/Profesion/insertar" autocomplete="off">
                      <?php csrf_field(); ?>
                      <div class="card card-default">
                          <div class="card-header">
                              <h3 class="card-title">Profesión</h3>
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
                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label for="nombre_profesion">Profesión</label>
                                          <input type="nombre_profesion" class="form-control" id="nombre_profesion" name="nombre_profesion" placeholder="Ingrese Profesión" value="<?php echo set_value('nombre_profesion') ?>" autofocus>
                                          <!-- /.form-group -->
                                          <div style="color: red;">
                                          <?= $error = $validation->getError('nombre_profesion'); ?>
                                          </div>
                                      </div>
                                      <div>
                                          
                                      </div>
                                      <!-- /.col -->
                                  </div>
                              </div>
                              <!-- /.row -->
                              <a href="<?php echo base_url() ?>/profesion" class="btn btn-primary">Volver</a>
                              <button class="btn btn-success" type="submit">Guardar</button>
                          </div>
                          <!-- /.card-body -->
                      </div>
                  </form>
              </div>
          </div>
      </div>