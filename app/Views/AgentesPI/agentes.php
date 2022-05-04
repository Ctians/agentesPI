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
            <a href="<?php echo base_url(); ?>/AgentesPI/nuevo" class="btn btn-info">Agregar</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <br>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Agentes de la propiedad Intelectual</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Foto</th>
                      <th>Cedula</th>
                      <th>Nombre Completo</th>
                      <th>Estatus</th>
                      <th>Fecha Creado</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($datos as $dato) : ?>
                      <tr>
                        <td align="center"><img class="img-thumbnail" src="<?php echo base_url(); ?>/Upload/FOTO/<?php echo $dato['foto_carnet']; ?>" width="80" alt=""></td>
                        <td><?php echo $dato['nacionalidad'] . "-" . $dato['cedula']; ?></td>
                        <td><?php echo $dato['nombre1'] . " " . $dato['nombre2'] . " " . $dato['apellido1'] . " " . $dato['apellido2'];; ?></td>
                        <td><?php echo $dato['permiso']; ?></td>
                        <td><?php echo $dato['fecha_creado']; ?></td>
                        <td><a href="<?php echo base_url(); ?>/AgentesPI/ver/<?php echo $dato['id_agentes']; ?>" class="btn btn-primary"><i class="nav-icon far fa-eye"></i></a>&nbsp;</td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Foto</th>
                      <th>Cedula</th>
                      <th>Nombre Completo</th>
                      <th>Estatus</th>
                      <th>Fecha Creado</th>
                      <th></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Registro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>¿Esta seguro que desea eliminar este registro?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-ligth" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-danger btn-ok">Si</a>
          </div>
        </div>
      </div>
    </div>