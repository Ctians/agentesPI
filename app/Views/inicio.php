  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0"><?php echo $titulo; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Escritorio v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <br>
        <div class="row">
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-light">
              <div class="inner">
                <h4><?php echo date('d-m-Y h:i:s'); ?></h4>
                <p>Hora y fecha del sistema</p>
              </div>
              <div class="icon">
                <i class="far fa-calendar-alt"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $usuarios['usuarios']; ?></h3>
                <p>Usuarios Registrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-friends"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $solicitada['cedula']; ?></h3>

                <p>Solicitudes de Credencial</p>
              </div>
              <div class="icon">
                <i class="fas fa-list-ol"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $credencial['cedula']; ?></h3>

                <p>Credenciales</p>
              </div>
              <div class="icon">
                <i class="fas fa-id-badge"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <section class="col-lg-6 connectedSortable">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Solicitudes</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart text-center">
                    <!-- <div id="graficaLineal">-->
                    <canvas id="GraficoBarra" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
          </section>

          <section class="col-lg-6 connectedSortable">
              <!-- STACKED BAR CHART -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Solicitudes</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <div id="graficaBarra">
                    </div>
                  </div>
                </div>
              </div>
            <!-- /.card -->
          </section>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->