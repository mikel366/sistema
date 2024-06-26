<div class="px-3">
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6 categorias">
                    <h4 class="page-title mb-0">CATEGORIAS</h4>
                    <button type="button" class="btn btn-success mt-2 btnBoton" data-bs-toggle="modal" data-bs-target="#agregarCategoria" tipo="nuevo">
                        <i>Agregar Categoria</i>
                    </button>
                </div>

                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>
                            <li class="breadcrumb-item active">Categorias</li>
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
                        <table class="table table-striped dt-responsive nowrap w-100 tablaCategorias">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE CATEGORIA</th>
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


<div class="modal fade" id="agregarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header bg-success">
                    <h5 class="modal-title"> Agregar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="form-label">Nombre de la categoria:</label>
                            <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
                <?php
                $agregarCategoria = new CategoriasControlador();
                $agregarCategoria->ctrAgregarCategoria();
                ?>  
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header bg-success">
                    <h5 class="modal-title"> Editar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="form-label">Nombre de la categoria:</label>
                            <input type="text" class="form-control nombre_categoria" name="editar_nombre_categoria" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
                <input type="hidden" class="editar_id_categoria" name="editar_id_categoria" value="">
                <?php
                $editarCategoria = new CategoriasControlador();
                $editarCategoria->ctrEditarCategoria();
                ?>  
            </form>
        </div>
    </div>
</div>

<?php
$eliminarCategoria=new CategoriasControlador;
$eliminarCategoria->ctrEliminarCategoria();
?>