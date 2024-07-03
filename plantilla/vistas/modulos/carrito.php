<?php
$carrito = ControladorCarrito::ctrMostrarCarrito(null, null);
?>


<div class="px-3">
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6 roles">
                    <h4 class="page-title mb-0">CARRITO</h4>
                </div>

                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>
                            <li class="breadcrumb-item active">Carrito</li>
                        </ol>
                    </div>
                </div>

            </div>

        </div>



        <!-- end page title -->
        <section class="content">

            <?php if (count($carrito) > 0) { ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Productos en el carrito</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap tablaCarrito">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Acciones</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <input type="hidden" id="url" value="<?php echo $url; ?>">

                                        <?php foreach ($carrito as $key => $value) {

                                            $producto = ProductosControlador::ctrMostrarProductos("id_producto", $value["id_producto"]);

                                        ?>
                                            <tr>
                                                <td><?php echo $producto["nombre_producto"]; ?></td>
                                                <td>
                                                    <form method="POST">

                                                        <input min=1 name="actualizarCantidad" type="number" value="<?php echo $value["cantidad"]; ?>">
                                                        <button type="button" class="btn bg-gradient-primary btn-sm"><i class="fas fa-sync"></i></button>
                                                        <?php
                                                        //$editar = new ControladorCarrito();
                                                        //$editar->ctrAgregarCarrito($value["id_producto"]);
                                                        ?>
                                                    </form>

                                                </td>
                                                <td><button type='button' id_producto="<?php echo $value["id_producto"]; ?>" class='btn bg-gradient-danger btnEliminarCarrito'><i class='fas fa-trash'></i></button></td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            <?php } else { ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h2>Carrito vacío</h2>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </section>
    </div>

    <!-- end row-->
</div> <!-- container -->
