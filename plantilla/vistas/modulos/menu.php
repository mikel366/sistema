<div class="main-menu">
                <!-- Brand Logo -->
                <div class="logo-box">
                    <!-- Brand Logo Light -->
                    <a href="<?php echo $url;?>" class="logo-light">
                        <img src="<?php echo $url;?>vistas/assets/images/logo-light.png" alt="logo" class="logo-lg" height="28">
                        <img src="<?php echo $url;?>vistas/assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="28">
                    </a>

                    <!-- Brand Logo Dark -->
                    <a href="<?php echo $url;?>" class="logo-dark">
                        <img src="<?php echo $url;?>vistas/assets/images/logo-dark.png" alt="dark logo" class="logo-lg" height="28">
                        <img src="<?php echo $url;?>vistas/assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="28">
                    </a>
                </div>

                <!--- Menu -->
                <div data-simplebar>
                    <ul class="app-menu">

                        <li class="menu-title">Menu</li>
                        
                        <li class="menu-item">
                            <a href="home" class="menu-link waves-effect waves-light">
                                <span class="menu-icon"><i class="mdi mdi-home-outline"></i></span>
                                <span class="menu-text"> Home </span>
                            </a>
                        </li>

                        

                        <li class="menu-item">
                            <a href="usuarios" class="menu-link waves-effect waves-light">
                                <span class="menu-icon"><i class="mdi mdi-account-group-outline"></i></span>
                                <span class="menu-text"> Usuarios </span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="productos" class="menu-link waves-effect waves-light">
                                <span class="menu-icon"><i class="mdi mdi-parking"></i></span>
                                <span class="menu-text"> Productos </span>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="categorias" class="menu-link waves-effect waves-light">
                                <span class="menu-icon"><i class="mdi mdi-format-list-checkbox"></i></span>
                                <span class="menu-text"> Categorias </span>
                            </a>
                        </li>

                        <li class="menu-item">
                        <a href="#menuTables" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="mdi mdi-recycle"></i></span>
                            <span class="menu-text"> Papelera </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuTables">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a href="usuarios_eliminados" class="menu-link">
                                        <span class="menu-text">Usuarios eliminados</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="productos_eliminados" class="menu-link">
                                        <span class="menu-text">Productos eliminados</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                        
                        <li class="menu-item">
                            <a href="salir" class="menu-link waves-effect waves-light">
                                <span class="menu-icon"><i class="mdi mdi-exit-to-app"></i></span>
                                <span class="menu-text"> Salir </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>