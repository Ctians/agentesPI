  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0"><?php

                                        use App\Controllers\Agentes;

                                        echo $titulo; ?></h1>
                      <br>
                      <a href="<?php echo base_url(); ?>/Agentes/nuevo" class="btn btn-info">Agregar</a>
                      <a href="<?php echo base_url(); ?>/Agentes/eliminados" class="btn btn-warning">Eliminados</a>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <br>
      <div class="container-fluid">
          <div class="row mb-12">
              <div class="col-sm-12">
                  <?php $validation = \Config\Services::validation(); ?>
                  <form enctype="multipart/form-data" method="POST" action="<?php echo base_url() ?>/Agentes/actualizar" autocomplete="off">
                      <?php csrf_field(); ?>

                      <input type="hidden" id="id_agentes" name="id_agentes" value="<?php echo $agentes['id_agentes']; ?>" />
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
                                      <!--<div class="col-12 col-sm-6">
                                          <label for="nacionalidad">Nacionalidad</label>
                                          <select id="nacionalidad" class="form-control" name="nacionalidad" value="<?php echo $agentes['nacionalidad']; ?>" disabled required>
                                              <option value="">Seleccione</option>
                                              <option value="V" <?php if ($agentes['nacionalidad'] == 'V') {
                                                                    echo 'selected';
                                                                } ?>>V</option>
                                              <option value="E" <?php if ($agentes['nacionalidad'] == 'E') {
                                                                    echo 'selected';
                                                                } ?>>E</option>
                                              <option value="P" <?php if ($agentes['nacionalidad'] == 'P') {
                                                                    echo 'selected';
                                                                } ?>>P</option>
                                          </select>
                                      </div> -->
                                      <div class="col-sm-6">
                                          <label for="cedula">Cédula de Identidad</label>
                                          <input type="cedula" class="form-control" id="cedula" name="cedula" value="<?php echo $agentes['nacionalidad'] . '-' . $agentes['cedula']; ?>" placeholder="Ingrese Cedula" autofocus disabled required>
                                          <!-- /.form-group -->
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label for="nombre1">Primer Nombre</label>
                                          <input type="nombre1" class="form-control" id="nombre1" name="nombre1" value="<?php echo $agentes['nombre1']; ?>" placeholder="Ingrese Primer Nombre" autofocus>
                                          <!-- /.form-group -->
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('nombre1'); ?>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label for="nombre2">Segundo Nombre</label>
                                          <input type="nombre2" class="form-control" id="nombre2" name="nombre2" value="<?php echo $agentes['nombre2']; ?>" placeholder="Ingrese Segundo Nombre" autofocus>
                                          <!-- /.form-group -->
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label for="apellido1">Primer Apellido</label>
                                          <input type="apellido1" class="form-control" id="apellido1" name="apellido1" value="<?php echo $agentes['apellido1']; ?>" placeholder="Ingrese Primer Apellido" autofocus>
                                          <!-- /.form-group -->
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('apellido1'); ?>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label for="apellido2">Segundo Apellido</label>
                                          <input type="apellido2" class="form-control" id="apellido2" name="apellido2" value="<?php echo $agentes['apellido2']; ?>" placeholder="Ingrese Segundo Apellido" autofocus>
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
                                                  <input type="text" class="form-control" id="telefono1" name="telefono1" value="<?php echo $agentes['telefono1']; ?>" placeholder="Ingrese Telefono principal" data-inputmask='"mask": "(9999) 999-9999"' data-mask autofocus required>
                                              </div>
                                              <!-- /.input group -->
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label for="telefono2">Telefono Secundario</label>
                                          <div class="input-group">
                                              <input type="text" class="form-control" id="telefono2" name="telefono2" value="<?php echo $agentes['telefono2']; ?>" placeholder="Ingrese Telefono secundario" data-inputmask='"mask": "(9999) 999-9999"' data-mask autofocus required>
                                          </div>
                                          <!-- /.form-group -->
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label for="direccion">Direccion de residencia</label>
                                          <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $agentes['direccion']; ?>" placeholder="Ingrese de Residencia" autofocus required>
                                          <!-- /.form-group -->
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label for="id_profesion">Profesion</label>
                                          <select id="id_profesion" class="form-control" name="id_profesion" required>
                                              <option value="">Seleccione</option>
                                              <?php foreach ($profesion as $profesion1) { ?>
                                                  <option value="<?php echo $profesion1['id_profesion']; ?>" <?php if ($profesion1['id_profesion'] == $agentes['id_profesion']) {
                                                                                                                    echo 'selected';
                                                                                                                } ?>><?php echo $profesion1['nombre_profesion']; ?></option>
                                              <?php } ?>
                                          </select>
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label for="nro_colegiado">Nro Colegiado</label>
                                          <input type="nro_colegiado" class="form-control" id="nro_colegiado" name="nro_colegiado" value="<?php echo $agentes['nro_colegiado']; ?>" placeholder="Ingrese Profesión" autofocus required>
                                          <!-- /.form-group -->
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label for="inpre">Inpre</label>
                                          <input type="text" class="form-control" id="inpre" name="inpre" value="<?php echo $agentes['inpre']; ?>" placeholder="Ingrese Inpre" autofocus required>
                                          <!-- /.form-group -->
                                      </div>
                                  </div>
                              </div>
                              
                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label for="foto_carnet">Foto tipo carnet</label>
                                          <div class="input-group">
                                              <div class="custom-file">
                                                  <input type="file" class="custom-file-input" id="foto_carnet" name="foto_carnet" value="<?php //echo $agentes['foto_carnet'];
                                                                                                                                            ?>">
                                                  <label class="custom-file-label" for="foto_carnet">Adjunte JPG o PNG</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-6 text-center">
                                          <img class="img-thumbnail" src="<?php echo base_url(); ?>/Upload/<?php echo $agentes['foto_carnet']; ?>" width="100" alt="">
                                      </div>
                                  </div>
                              </div>
                              <!-- /.col -->
                              <a href="<?php echo base_url() ?>/agentes" class="btn btn-primary">Volver</a>
                              <button class="btn btn-success" type="submit">Guardar</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>