<?php
$marcas = MarcasControlador::ctrMostrarMarcas(null, null);
$categorias = CategoriasControlador::ctrMostrarCategorias(null, null);
$estados = Funciones::MostrarEstados(null, null);
?>


    <!-- Start Page Content here -->
        <div class="px-3">
            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                <div class="py-3 py-lg-4">
                    <div class="row">
                        <div class="col-lg-6 productos">
                                <h4 class="page-title mb-0">PRODUCTOS</h4>
                                <button type="button" class="btn btn-success mt-2 btnBoton" data-bs-toggle="modal" data-bs-target="#agregarProductoModal" tipo="nuevo">
                                <i>Agregar Producto</i>
                                </button>
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
                                            <th>Categoria</th>
                                            <th>Marcas</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
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



<div class="modal fade" id="agregarProductoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="agregarProducto" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="modal-header bg-success">
                    <h5 class="modal-title">Agregar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="agregarValidationTooltip01" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre_producto" id="agregarValidationTooltip01" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="agregarValidationTooltip02" class="form-label">Precio</label>
                                <input type="number" class="form-control" name="precio_producto" id="agregarValidationTooltip02" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="agregarValidationTooltip03" class="form-label">Cantidad de producto</label>
                                <input type="number" class="form-control" name="cantidad_producto" id="agregarValidationTooltip03" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="agregarValidationTooltip04" class="form-label">Descripcion del producto</label>
                                <textarea class="form-control" name="descripcion_producto" id="agregarValidationTooltip04" placeholder="" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="agregarValidationTooltip05">Categoría</label>
                            <select class="form-control" name="categoria_producto" id="agregarValidationTooltip05" required>
                                <option value="">Seleccione una categoria</option>
                                <?php foreach ($categorias as $key => $value) { ?>
                                    <option value="<?php echo $value["id_categoria"]; ?>">
                                        <?php echo $value["nombre_categoria"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="agregarValidationTooltip06">Marcas</label>
                            <select class="form-control" name="marca_producto" id="agregarValidationTooltip06" required>
                                <option value="">Seleccione una marca</option>
                                <?php foreach ($marcas as $key => $value) { ?>
                                    <option value="<?php echo $value["id_marca"]; ?>">
                                        <?php echo $value["nombre_marca"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="agregarValidationTooltip07">Estado del producto</label>
                            <select class="form-control" name="estado_producto" id="agregarValidationTooltip07" required>
                                <option value="">Seleccione el estado</option>
                                <?php foreach ($estados as $key => $value) { ?>
                                    <option value="<?php echo $value["id_estado"]; ?>">
                                        <?php echo $value["nombre_estado"]; ?></option>
                                <?php } ?>
                            </select>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div> <!-- /.modal -->

<div class="modal fade" id="editarProductoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form id="editarProducto" method="post" enctype="multipart/form-data">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Nombre</label>
                                <input type="text" name="editar_nombre_producto" class="form-control nombre_producto" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Precio</label>
                                <input type="number" name="editar_precio_producto" class="form-control precio_producto" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label>Cantidad de producto</label>
                                <input type="number" name="editar_cantidad_producto" class="form-control cantidad_producto" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label>Descripcion del producto</label>
                                <textarea name="editar_descripcion_producto" class="form-control descripcion_producto" placeholder=""></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Categoría</label>
                            <select class="form-control" name="editar_categoria_producto" id="categoria">
                                <option value="">Seleccione una categoria</option>
                                <?php foreach ($categorias as $key => $value) { ?>
                                    <option value="<?php echo $value["id_categoria"]; ?>">
                                        <?php echo $value["nombre_categoria"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Marcas</label>
                            <select class="form-control" name="editar_marca_producto" id="marca">
                                <option value="">Seleccione una marca</option>
                                <?php foreach ($marcas as $key => $value) { ?>
                                    <option value="<?php echo $value["id_marca"]; ?>">
                                        <?php echo $value["nombre_marca"]; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Estado del producto</label>
                            <select class="form-control" name="editar_estado_producto" id="estado">
                                <option value="">Seleccione el estado</option>
                                <?php foreach ($estados as $key => $value) { ?>
                                    <option value="<?php echo $value["id_estado"]; ?>">
                                        <?php echo $value["nombre_estado"]; ?></option>
                                <?php } ?>
                            </select>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
                    <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div> <!-- /.modal -->

<div class="modal fade" id="detalleProductoModal" tabindex="-1" aria-labelledby="detalleProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detalleProductoModalLabel">Detalles del Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="" alt="Imagen del Producto" class="previsualizarImagen img-fluid">
                    </div>
                    <div class="col-md-8">
                        <h5>Nombre: <span class="nombre_producto"></span></h5>
                        <p>Precio: <span class="precio_producto"></span></p>
                        <p>Cantidad: <span class="cantidad_producto"></span></p>
                        <p>Descripción: <span class="descripcion_producto"></span></p>
                        
                        <p>Estado: <span class="estado_producto"></span></p>
                        <p>Fecha de creación: <span class="fecha_creacion_producto"></span></p>
                        <p>Última fecha de actualización: <span class="fecha_edicion_producto"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<?php
$eliminar = new ProductosControlador();
$eliminar->ctrExportarProducto();
?>
