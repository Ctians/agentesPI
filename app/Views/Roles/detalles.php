  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $titulo; ?></h1>
            <br>
            <form id="form_accesos" name="form_accesos" method="POST" action="<?php echo base_url(); ?>/roles/guardaAccesos">

            <input type="hidden" name="id_rol" value="<?php echo $id_rol ?>">
            <?php foreach ($accesos as $acceso) { ?>
              <div class="form-check">
                <input class="" type="checkbox" value="<?php echo $acceso['id']; ?>" name="accesos[]" <?php if(isset($asignado[$acceso['id']])) { echo 'checked'; } ?>>
                <label class="" for=""><?php echo $acceso['nombre']; ?></label>
              </div><br>
            <?php } ?>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->