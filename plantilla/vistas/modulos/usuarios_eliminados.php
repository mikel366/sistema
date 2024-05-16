<?php

$roles = RolesControlador::ctrMostrarRoles(null, null);
$estados = Funciones::MostrarEstados(null, null);
?>

<!-- Begin page -->
<div class="layout-wrapper">
    <!-- Start Page Content here -->
    <div class="page-content">
        <div class="px-3">
            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                <div class="py-3 py-lg-4">
                    <div class="row">
                        <div class="col-lg-6 usuariosEliminados">
                                <h4 class="page-title mb-0">USUARIOS ELIMINADOS</h4>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="d-none d-lg-block">
                                <ol class="breadcrumb m-0 float-end">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                    <li class="breadcrumb-item active">Usuarios eliminados</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <input type="hidden" id="url" value="<?php echo $url; ?>">
                                <table  class="table table-striped dt-responsive nowrap w-100 tablaUsuariosEliminados">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Rol</th>
                                            <th>Estado</th>
                                            <th>Fecha de eliminacion</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    
                                    
                                </table>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
    <!-- End Page content -->
</div>

<?php

$restablecer = new UsuariosControlador();
$restablecer->ctrRestrablecerUsuario();

$eliminar = new UsuariosControlador();
$eliminar->ctrEliminarUsuario();
?>