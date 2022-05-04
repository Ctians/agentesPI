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
      <div class="container-fluid">
          <div class="row mb-12">
              <div class="col-sm-12">
                  <?php $validation = \Config\Services::validation(); ?>
                  <form autocomplete="off">
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
                                          <input type="cedula" class="form-control" id="cedula" name="cedula" value="<?php echo $agentes['nacionalidad'] . '-' . $agentes['cedula']; ?>" autofocus disabled>
                                          <!-- /.form-group -->
                                      </div>

                                      <div class="col-12 col-sm-6">
                                          <label for="id_usuarios">Correo</label>
                                          <select id="id_usuarios" class="form-control" name="id_correo" disabled>
                                              <option value="">Seleccione</option>
                                              <?php foreach ($usuarios as $usuario) { ?>
                                                  <option value="<?php echo $usuario['id_usuarios']; ?>" <?php if ($usuario['id_usuarios'] == $agentes['id_usuarios']) {
                                                                                                                echo 'selected';
                                                                                                            } ?>><?php echo $usuario['correo']; ?></option>
                                              <?php } ?>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label for="nombre1">Primer Nombre</label>
                                          <input type="nombre1" class="form-control" id="nombre1" name="nombre1" value="<?php echo $agentes['nombre1']; ?>" autofocus disabled>
                                          <!-- /.form-group -->
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('nombre1'); ?>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label for="nombre2">Segundo Nombre</label>
                                          <input type="nombre2" class="form-control" id="nombre2" name="nombre2" value="<?php echo $agentes['nombre2']; ?>" autofocus disabled>
                                          <!-- /.form-group -->
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label for="apellido1">Primer Apellido</label>
                                          <input type="apellido1" class="form-control" id="apellido1" name="apellido1" value="<?php echo $agentes['apellido1']; ?>" autofocus disabled>
                                          <!-- /.form-group -->
                                          <div style="color: red;">
                                              <?= $error = $validation->getError('apellido1'); ?>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label for="apellido2">Segundo Apellido</label>
                                          <input type="apellido2" class="form-control" id="apellido2" name="apellido2" value="<?php echo $agentes['apellido2']; ?>" autofocus disabled>
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
                                                  <input type="text" class="form-control" id="telefono1" name="telefono1" value="<?php echo $agentes['telefono1']; ?>" placeholder="Ingrese Telefono principal" data-inputmask='"mask": "(9999) 999-9999"' data-mask autofocus disabled>
                                              </div>
                                              <!-- /.input group -->
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label for="telefono2">Telefono Secundario</label>
                                          <div class="input-group">
                                              <input type="text" class="form-control" id="telefono2" name="telefono2" value="<?php echo $agentes['telefono2']; ?>" placeholder="Ingrese Telefono secundario" data-inputmask='"mask": "(9999) 999-9999"' data-mask autofocus disabled>
                                          </div>
                                          <!-- /.form-group -->
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <label for="direccion">Direccion de residencia</label>
                                          <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $agentes['direccion']; ?>" placeholder="Ingrese de Residencia" autofocus disabled>
                                          <!-- /.form-group -->
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label for="id_profesion">Profesion</label>
                                          <select id="id_profesion" class="form-control" name="id_profesion" disabled>
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
                                          <input type="nro_colegiado" class="form-control" id="nro_colegiado" name="nro_colegiado" value="<?php echo $agentes['nro_colegiado']; ?>" placeholder="Ingrese Profesión" autofocus disabled>
                                          <!-- /.form-group -->
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <label for="inpre">Inpre</label>
                                          <input type="text" class="form-control" id="inpre" name="inpre" value="<?php echo $agentes['inpre']; ?>" placeholder="Ingrese Inpre" autofocus disabled>
                                          <!-- /.form-group -->
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-12 col-md-12 text-center">
                                          <label for="inpre">Foto tipo carnet</label><br>
                                          <img class="img-thumbnail" src="<?php echo base_url(); ?>/Upload/FOTO/<?php echo $agentes['foto_carnet']; ?>" width="100" alt="">
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-12 col-sm-6">
                                          <button class="btn btn-info btn-block" href="#" data-href="<?php echo base_url(); ?>/Upload/PDF/<?php echo $agentes['nro_colegiado_file']; ?>" data-toggle="modal" data-target="#modal-pdf" data-placement="top">Carnet de Colegiado</button>
                                          <!-- /.form-group -->
                                      </div>
                                      <div class="col-12 col-sm-6">
                                          <button class="btn btn-info btn-block" href="#" data-href="<?php echo base_url(); ?>/Upload/PDF/<?php echo $agentes['inpre_file']; ?>" data-toggle="modal" data-target="#modal-pdf" data-placement="top">Carnet INPRE</button>
                                          <!-- /.form-group -->
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="row">
                                      <div class="col-3 col-sm-3 col-md-3">
                                      </div>
                                      <div class="col-6 col-sm-6 col-md-6">
                                          <button class="btn btn-info btn-block" href="#" data-href="<?php echo base_url(); ?>/Upload/PDF/<?php echo $agentes['titulo_file']; ?>" data-toggle="modal" data-target="#modal-pdf" data-placement="top">Especializacion PI</button>
                                          <!-- /.form-group -->
                                      </div>
                                      <div class="col-3 col-sm-3 col-md-3">
                                      </div>
                                  </div>
                              </div>
                              <br>
                              <div class="form-group text-center">
                                  <div class="row">
                                      <div class="col-6 col-sm-6 col-md-6">
                                          <button class="btn btn-danger btn-block" href="#" data-href="<?php echo base_url() ?>/agentes/desaprobar/<?php echo $agentes['id_agentes'] ?>" data-toggle="modal" data-target="#modal-des" data-placement="top" title="">
                                              <i class="fas fa-file"></i>&nbspDesaprobar</button>
                                      </div>
                                      <div class="col-6 col-sm-6 col-md-6">
                                          <button class="btn btn-success btn-block" href="#" data-href="<?php echo base_url() ?>/agentes/aprobar/<?php echo $agentes['id_agentes'] ?>" data-toggle="modal" data-target="#modal-apro" data-placement="top" title="">
                                              <i class="fas fa-file"></i>&nbspAprobar</button>
                                      </div>
                                  </div>
                              </div>
                              <!-- /.col -->
                              <a href="<?php echo base_url() ?>/Agentes" class="btn btn-primary">Volver</a>
                              <button class="btn btn-success" type="submit">Guardar</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>

      <div class="modal fade" id="modal-pdf" tab-index="-1" role="dialog">
          <div class="modal-dialog modal-lg">
              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">PDF</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      <iframe id='pdf' width="100%" height="500" frameborder="0"></iframe>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="modal fade" id="modal-apro" tab-index="-1" role="dialog">
          <div class="modal-dialog modal-lg">
              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Aprobar</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <form action="" id='apro-form' method="post">
                      <div class="modal-body">
                          <p>¿Esta seguro que desea aprobar esta credencial?</p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          <button type="submit" name="aprobado" value="aprobado" id="btn-des" class="btn btn-success">Aprobar</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>

      <div class="modal fade" id="modal-des" tab-index="-1" role="dialog">
          <div class="modal-dialog modal-lg">
              <!-- Modal content-->
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Desaprobar</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      <form id="des-form" action="" method="post">
                          <div class="form-group">
                              <div class="col-12">
                                  <label for="">Razón de la desaprobación</label>
                                  <textarea name="razon_desaprobar" id="des-text" cols="8" rows="4" class="form-control" autofocus required><?php echo trim(set_value('razon_desaprobar')) ?></textarea>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <button type="submit" name="rechazado" value="rechazado" id="btn-desa" class="btn btn-danger" disabled="disabled">Rechazar</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>