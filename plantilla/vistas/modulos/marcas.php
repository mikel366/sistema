<div class="px-3">
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6 marcas">
                    <h4 class="page-title mb-0">MARCAS</h4>
                    <button type="button" class="btn btn-success mt-2 btnBoton" data-bs-toggle="modal" data-bs-target="#agregarMarca" tipo="nuevo">
                        <i>Agregar Marca</i>
                    </button>
                </div>

                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>
                            <li class="breadcrumb-item active">Marcas</li>
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
                        <table class="table table-striped dt-responsive nowrap w-100 tablaMarcas">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE MARCA</th>
                                    <th>ACCIONES</th>
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


<div class="modal fade" id="agregarMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header bg-success">
                    <h5 class="modal-title"> Agregar Marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="form-label">Nombre de la marca:</label>
                            <input type="text" class="form-control" id="nombre_marca" name="nombre_marca" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
                <?php
                $agregarMarca = new MarcasControlador();
                $agregarMarca->ctrAgregarMarca();
                ?>  
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editarMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header bg-success">
                    <h5 class="modal-title"> Editar Marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="form-label">Nombre de la marca:</label>
                            <input type="text" class="form-control nombre_marca" id="nombre_marca" name="editar_nombre_marca" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
                <input type="hidden" class="editar_id_marca" name="editar_id_marca" value="">
                <?php
                $editarMarca = new MarcasControlador();
                $editarMarca->ctrEditarMarca();
                ?>  
            </form>
        </div>
    </div>
</div>

<?php
$eliminarMarca = new MarcasControlador;
$eliminarMarca->ctrEliminarMarca();
?>