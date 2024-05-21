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
                                <h4 class="page-title mb-0">PRODUCTOS ELIMINADOS</h4>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="d-none d-lg-block">
                                <ol class="breadcrumb m-0 float-end">
                                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>
                                    <li class="breadcrumb-item active">Productos eliminados</li>
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
                                <table  class="table table-striped dt-responsive nowrap w-100 tablaProductosEliminados">
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

<?php

$restablecer = new ProductosControlador;
$restablecer -> ctrRestrablecerProducto();

$eliminar = new ProductosControlador;
$eliminar -> ctrEliminarProducto();