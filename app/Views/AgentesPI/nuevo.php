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
                  <form enctype="multipart/form-data" method="POST" action="<?php echo base_url() ?>/AgentesPI/insertar" autocomplete="off">
                      <?php csrf_field(); ?>
                      <div class="card card-default">
                          <div class="card-header">
                              <h3 class="card-title">Crear Agentes</h3>
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
                                          <label for="nacionalidad">Nacionalidad</label>
                                          <select class="form-control" id="nacionalidad" name="nacionalidad">
                                              <option value="">Seleccione</option>
                                              <option value="V" <?php echo 'V' == set_value('nacionalidad') ? 'selected' : '' ?>>V</option>
                                              <option value="E" <?php echo 'E' == set_value('nacionalidad') ? 'selected' : '' ?>>E</option>
                                              <option value="P" <?php echo 'P' == set_value('nacionalidad') ? 'selected' : '' ?>>P</option>
                                          </select>
                                          <!-- /.form-group -->
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('nacionalidad'); ?>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label for="cedula">Cedula</label>
                                          <input type="cedula" class="form-control" id="cedula" name="cedula" maxlength="8" minlength="6" placeholder="Ingrese Cedula" value="<?php echo set_value('cedula') ?>" autofocus>
                                          <!-- /.form-group -->
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('cedula'); ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label for="nombre1">Primer Nombre</label>
                                          <input type="nombre1" class="form-control" id="nombre1" name="nombre1" value="<?php echo set_value('nombre1') ?>" placeholder="Ingrese Primer Nombre" autofocus>
                                          <!-- /.form-group -->
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('nombre1'); ?>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label for="nombre2">Segundo Nombre</label>
                                          <input type="nombre2" class="form-control" id="nombre2" name="nombre2" value="<?php echo set_value('nombre2') ?>" placeholder="Ingrese Segundo Nombre" autofocus>
                                          <!-- /.form-group -->
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label for="apellido1">Primer Apellido</label>
                                          <input type="apellido1" class="form-control" id="apellido1" name="apellido1" value="<?php echo set_value('apellido1') ?>" placeholder="Ingrese Primer Apellido" autofocus>
                                          <!-- /.form-group -->
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('apellido1'); ?>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label for="apellido2">Segundo Apellido</label>
                                          <input type="apellido2" class="form-control" id="apellido2" name="apellido2" value="<?php echo set_value('apellido2') ?>" placeholder="Ingrese Segundo Apellido" autofocus>
                                          <!-- /.form-group -->
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <div class="form-group">
                                              <label for="telefono1">Telefono Principal</label>
                                              <div class="input-group">
                                                  <input type="text" class="form-control" id="telefono1" name="telefono1" value="<?php echo set_value('telefono1') ?>" placeholder="Ingrese Telefono principal" data-inputmask='"mask": "(9999) 999-9999"' data-mask autofocus>
                                              </div>
                                              <!-- /.input group -->
                                              <div style="color: red;">
                                                  <?= $error = $validation->getError('telefono1'); ?>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label for="telefono2">Telefono Secundario</label>
                                          <div class="input-group">
                                              <input type="text" class="form-control" id="telefono2" name="telefono2" value="<?php echo set_value('telefono2') ?>" placeholder="Ingrese Telefono secundario" data-inputmask='"mask": "(9999) 999-9999"' data-mask autofocus>
                                          </div>
                                          <!-- /.form-group -->
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label for="direccion">Dirección de residencia</label>
                                          <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo set_value('direccion') ?>" placeholder="Ingrese la Dirección de Residencia" autofocus>
                                          <!-- /.form-group -->
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('direccion'); ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label for="id_profesion">Profesión</label>
                                          <select id="id_profesion" class="form-control" name="id_profesion">
                                              <option value="">Seleccione</option>
                                              <?php foreach ($profesion as $profesion1) { ?>
                                                  <option value="<?php echo $profesion1['id_profesion']; ?>" <?php echo set_value('id_profesion') == $profesion1['id_profesion'] ? 'selected' : '' ?>><?php echo $profesion1['nombre_profesion']; ?></option>
                                              <?php } ?>
                                          </select>
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('id_profesion'); ?>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label for="nro_colegiado">Nro Colegiado</label>
                                          <input type="nro_colegiado" class="form-control" id="nro_colegiado" name="nro_colegiado" value="<?php echo set_value('nro_colegiado') ?>" placeholder="Ingrese Profesión" autofocus>
                                          <!-- /.form-group -->
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('nro_colegiado'); ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label for="inpre">Inpre</label>
                                          <input type="text" class="form-control" id="inpre" name="inpre" value="<?php echo set_value('inpre') ?>" placeholder="Ingrese Inpre" autofocus>
                                          <!-- /.form-group -->
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('inpre'); ?>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label for="foto_carnet">Foto tipo carnet</label>
                                          <div class="input-group">
                                              <div class="custom-file">
                                                  <input type="file" class="custom-file-input" id="foto_carnet" name="foto_carnet" value="<?php echo set_value('foto_carnet') ?>">
                                                  <label class="custom-file-label" for="foto_carnet">Adjunte PNG</label>
                                              </div>
                                          </div>
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('foto_carnet'); ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label>Carnet de Colegiado</label>
                                          <div class="input-group">
                                              <div class="custom-file">
                                                  <input type="file" class="custom-file-input" id="nro_colegiado_file" name="nro_colegiado_file" value="<?php echo set_value('nro_colegiado_file') ?>">
                                                  <label class="custom-file-label" for="nro_colegiado_file">Adjunte en PDF</label>
                                              </div>
                                          </div>
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('nro_colegiado_file'); ?>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label>Carnet INPRE</label>
                                          <div class="input-group">
                                              <div class="custom-file">
                                                  <input type="file" class="custom-file-input" id="inpre_file" name="inpre_file" value="<?php echo set_value('inpre_file') ?>">
                                                  <label class="custom-file-label" for="inpre_file">Adjunte en PDF</label>
                                              </div>
                                          </div>
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('inpre_file'); ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label>Especializacion PI</label>
                                          <div class="input-group">
                                              <div class="custom-file">
                                                  <input type="file" class="custom-file-input" id="titulo_file" name="titulo_file" value="<?php echo set_value('titulo_file') ?>">
                                                  <label class="custom-file-label" for="titulo_file">Adjunte en PDF</label>
                                              </div>
                                          </div>
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('titulo_file'); ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <!-- /.col -->
                              <a href="<?php echo base_url() ?>/AgentesPI" class="btn btn-primary">Volver</a>
                              <button class="btn btn-success" type="submit">Guardar</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>