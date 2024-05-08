<div class="px-3">
             <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6">                                
                    <div class="card-body">                             
                        <!-- sample modal content -->    
                        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <form id="agregarUsuario" method="post">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Agregar usuario</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="field-1" class="form-label">Nombre</label>
                                                        <input type="text" class="form-control" name="nombre_usuario" id="field-1" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="field-2" class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="email_usuario" id="field-2" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="field-3" class="form-label">Password</label>
                                                        <input type="password" class="form-control" name="password_usuario" id="field-3" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <?php  
                                                if ($rutas[0]== "usuarios")
                                                {?>
                                                    <label>Roles</label>
                                                    <select class="form-control" name="id_rol_usuario">

                                                    <option value="">Seleccione un rol</option>
                                                    <?php foreach ($roles as $key => $value) { ?>

                                                    <option value="<?php echo $value["id_rol"]; ?>"><?php echo $value["nombre_rol"]; ?></option>

                                                    <?php } ?>
                                                </select>
                                                <?php }?>

                                                                
                                            </div>
                                                            
                                        </div>
                                        <?php
                                            $agregarUsuario = new UsuariosControlador();
                                            $agregarUsuario->ctrAgregarUsuario();
                                        ?>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Guardar</button>
                                         </div>
                                    </div>
                                </div>
                            </form>
                                            
                        </div><!-- /.modal -->
    
                        <div class="button-list">
                                            <!-- Responsive modal -->
                            <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#con-close-modal">Agregar</button>
                                            <!-- Accordion modal -->

                        </div>
                    </div>
                                
            </div> <!-- end col -->
                        
        </div>
                        <!-- end row -->
                        
    </div> <!-- container -->
 </div> <!-- content -->