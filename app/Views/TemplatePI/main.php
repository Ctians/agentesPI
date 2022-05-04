<?php
$user_session = session();

?>
<!-- Main Sidebar Container -->
<style>
    .main-sidebar {
        background-color: #003366 !important;
    }
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>/home" class="brand-link">
        <img src="<?php echo base_url(); ?>/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light h5"><b>Agentes</b>PI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info col-8">
                <a href="#" class="d-block"><?php echo $user_session->correo; ?></a>
            </div>
            <div class="image col-4">
                <a href="<?php echo base_url(); ?>/usuarios/logout"><img src="<?php echo base_url(); ?>/salir.png" alt="User Image"></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/AgentesPI" class="nav-link">
                        <i class="nav-icon fas fa-university"></i>
                        <p>
                            Agentes
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>/CredencialPI" class="nav-link">
                        <i class="nav-icon fas fa-id-badge"></i>
                        <p>
                            Credencial
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>