<?php
//Trae todos los productos

$categorias = CategoriasControlador::ctrMostrarCategorias(null, null);
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
                        <div class="col-lg-6 productos">
                                <h4 class="page-title mb-0">PRODUCTOS</h4>
                                <button type="button" class="btn btn-success mt-2 btnBoton" data-bs-toggle="modal" data-bs-target="#agregarProductoModal" tipo="nuevo">
                                <i>Agregar</i>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="d-none d-lg-block">
                                <ol class="breadcrumb m-0 float-end">
                                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>
                                    <li class="breadcrumb-item active">Productos</li>
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
                            <table  class="table table-striped dt-responsive nowrap w-100 tablaProductos">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                    
                                </table>
                                <?php //print_r($productos)?>
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




<div class="modal fade" id="agregarProductoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form id="agregarProducto" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre_producto" id="field-1" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">precio</label>
                                <input type="number" class="form-control" name="precio_producto" id="field-2" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Categoría</label>
                            <select class="form-control" name="categoria_producto">
                            <option value="">Seleccione un elemento de la lista</option>
                            <?php foreach ($categorias as $key => $value) { ?>
                                <option value="<?php echo $value["id_categoria"]; ?>">
                                    <?php echo $value["nombre_categoria"]; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Imagen</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="subirImagen" name="imagen_producto">
                                <label class="custom-file-label" for="exampleInputFile">Seleccione una imagen</label>
                            </div>
                        </div>
                        <img width="100" class="previsualizarImagen" src="" alt="">
                    </div>

                </div>
                            <?php
                            $agregar = new ProductosControlador();
                            $agregar->ctrAgregarProducto();
                            ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div> <!-- /.modal -->


<<div class="modal fade" id="editarProductoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form id="editarProducto" method="post" enctype="multipart/form-data">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="field-1" class="form-label">Nombre Producto</label>
                                <input type="text" class="form-control nombre_producto" name="editar_nombre_producto" id="field-1" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="field-2" class="form-label">precio</label>
                                <input type="number" class="form-control precio_producto" name="editar_precio_producto" id="field-2" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Categoría</label>
                            <select class="form-control" name="editar_categoria_producto" id="categoria">
                            <option value="">Seleccione un elemento de la lista</option>
                            <?php foreach ($categorias as $key => $value) { ?>
                                <option value="<?php echo $value["id_categoria"]; ?>">
                                    <?php echo $value["nombre_categoria"]; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Imagen</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="subirImagen" name="editar_imagen_producto">
                                <label class="custom-file-label" for="exampleInputFile">Seleccione una imagen</label>
                            </div>
                        </div>
                        <img width="100" class="previsualizarImagen" src="" alt="">
                    </div>

                </div>
                <input type="hidden" class="editar_id_producto" name="editar_id_producto" value="">
                        <?php
                        $editar = new ProductosControlador();
                        $editar->ctrEditarProducto();
                        ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div> <!-- /.modal -->


<?php
$eliminar = new ProductosControlador();
$eliminar->ctrEliminarProducto();
?>