<?php
$configuracion = PlantillaControlador::ctrMostrarConfiguracion("id_configuracion", 1);
?>


<div class="px-3">
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6 roles">
                    <h4 class="page-title mb-0">CONFIGURACIÓN</h4>
                </div>

                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>
                            <li class="breadcrumb-item active">Configuracion</li>
                        </ol>
                    </div>
                </div>

            </div>

        </div>



        <!-- end page title -->
        <div class="row">
            <section class="content">

                <div class="modal-body">

                    <div class="form-group">
                        <label>Nombre empresa</label>
                        <input value="<?php echo $configuracion["empresa_configuracion"]; ?>" type="text" name="empresa_configuracion" class="form-control empresa_configuracion" placeholder="Ingrese el nombre del producto">
                    </div>
                    <div class="form-group">
                        <label>Email empresa</label>
                        <input value="<?php echo $configuracion["email_configuracion"]; ?>" type="text" name="email_configuracion" class="form-control email_configuracion" placeholder="Ingrese el nombre del producto">
                    </div>
                    <div class="form-group">
                        <label>Teléfono empresa</label>
                        <input value="<?php echo $configuracion["telefono_configuracion"]; ?>" type="text" name="telefono_configuracion" class="form-control telefono_configuracion" placeholder="Ingrese el nombre del producto">
                    </div>

                </div>

                <input type="hidden" class="id_configuracion" name="id_configuracion" value="<?php echo $configuracion["id_configuracion"]; ?>">

                <input type="hidden" id="url" value="<?php echo $url; ?>">

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-warning mt-1" data-dismiss="modal"><i class="fas fa-times"></i>
                        Cerrar</button>
                    <button type="button" id="guardarConfiguracion" class="btn btn-primary mt-1"><i class="fas fa-save"></i> Guardar</button>
                </div>

            </section>
        </div>

        <!-- end row-->
    </div> <!-- container -->


</div> <!-- content -->