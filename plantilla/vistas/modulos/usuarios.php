<?php

$roles = RolesControlador::ctrMostrarRoles(null, null);
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
                        <div class="col-lg-6">
                                <h4 class="page-title mb-0">USUARIOS</h4>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="d-none d-lg-block">
                                <ol class="breadcrumb m-0 float-end">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                    <li class="breadcrumb-item active">Usuarios</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#agregarUsuarioModal">
                    <i>Agregar</i> 
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <input type="hidden" id="url" value="<?php echo $url; ?>">
                                <table  class="table table-striped dt-responsive nowrap w-100 tablaUsuarios">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Rol</th>
                                            <th>Estado</th>
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

<div class="modal fade" id="agregarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="agregarUsuario" method="post" class="needs-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title">Agregar usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="validationTooltip01" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre_usuario" id="validationTooltip01" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="validationTooltip01" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email_usuario" id="validationTooltip01" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="validationTooltip01" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password_usuario" id="validationTooltip01" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
            
                            <label>Roles</label>
                            <select class="form-control" name="id_rol_usuario" id="validationTooltip01" required>
                                <option value="">Seleccione un rol</option>
                                <?php foreach ($roles as $key => $value) { ?>
                                    <option value="<?php echo $value["id_rol"]; ?>"><?php echo $value["nombre_rol"]; ?></option>
                                <?php } ?>
                            </select>
    
                    </div>
                </div>
                <?php
                $agregarUsuario = new UsuariosControlador();
                $agregarUsuario->ctrAgregarUsuario();
                ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div> <!-- /.modal -->
