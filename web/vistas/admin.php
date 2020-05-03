<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel de administracion</title>

    <!-- Bootstrap core CSS -->
    <link href="js/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Admin </div>
            <div class="list-group list-group-flush">
                <a id="btnReportes" href="#" class="list-group-item list-group-item-action bg-light">Reportes</a>
                <a id="btnUsuarios" href="#" class="list-group-item list-group-item-action bg-light">Usuarios</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-secondary" id="menu-toggle">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acciones
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" onClick="cerrarSesion()" href="#">Cerrar Sesion</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id="contenedor_reportes">
                <div class="alert alert-primary" role="alert">
                    <h4 id="cabecera">Estado de los reportes</h4>
                </div>
                <!-- Barra de busqueda -->
                <div class="container">
                    <!-- Fromulario de busqueda -->
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="dropTitle">Seleccione La Ciudad</label>
                                <div class=" btn-group">
                                    <button id="dropTitle" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Seleccione Ciudad
                                    </button>
                                    <div class="dropdown-menu">
                                        <a id="selectCoa" class="dropdown-item" href="#">Coatepec</a>
                                        <a id="selectCordoba" class="dropdown-item" href="#">Cordoba</a>
                                        <a id="selectCoatza" class="dropdown-item" href="#">Coatzacoalcos</a>
                                        <a id="selectMina" class="dropdown-item" href="#">Minatitlan</a>
                                        <a id="selectPuebla" class="dropdown-item" href="#">Puebla</a>
                                        <a id="selectPozaRica" class="dropdown-item" href="#">Poza Rica</a>
                                        <a id="selectVeracruz" class="dropdown-item" href="#">Veracruz</a>
                                        <a id="selectXalapa" class="dropdown-item" href="#">Xalapa</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputEmail4">Fecha de inicio</label>
                                <input type="date" class="form-control" id="fechaInicial">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Fecha final</label>
                                <input type="date" class="form-control" id="fechaFinal" disabled>
                                <input type="checkbox" id="chboxHabilitarFechaFinal">
                                <small class="text-muted" for="gridCheck">Habilite para buscar entre 2 fechas</small>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="btnFecha">Buscar por fecha</label>
                                <button id="btnFecha" type="button" class="form-control btn btn-primary">Buscar</button>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="folio">Ingrese el Folio</label>
                                <input type="text" class="form-control" id="folio" placeholder="">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="btnFolio">Buscar Por Folio</label>
                                <button id="btnFolio" type="button" class="form-control btn btn-secondary">Buscar</button>
                            </div>
                        </div>
                    </form>
                    <!-- /Fromulario de busqueda -->
                </div>
                <!-- /Barra de busqueda -->
                <div class="alert alert-info" role="alert">
                </div>
                <!-- Lista de reportes -->
                <div class="container">
                    <div class="row">
                        <div id="listaReportes" class="list-group col-md-3">
                        </div>
                        <div class="card border-primary col-md-6">
                            <img src="img/logo_mendezBN.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div id="cardTitle">
                                </div>
                                <ul id="listaResumen" class="list-group list-group-flush">
                                </ul>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Lista de reportes -->
                <div class="text-center alert alert-dark" role="alert">
                    Reporte Fotografico
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div id="img1" class="col-md-3">

                        </div>
                        <div id="img2" class="col-md-3">

                        </div>
                        <div id="img3" class="col-md-3">

                        </div>
                        <div id="img4" class="col-md-3">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /#contenedor_reporte -->


            <div class="container">
                <div id="contenedor_usuarios">
                    <div class="text-center alert alert-primary" role="alert">
                        <h4>Gestion de usuarios</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button id="dropUserTitle" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Seleccione Ciudad
                                </button>
                                <div class="dropdown-menu">
                                    <a id="selectUserCoa" class="dropdown-item" href="#">Coatepec</a>
                                    <a id="selectUserCordoba" class="dropdown-item" href="#">Cordoba</a>
                                    <a id="selectUserCoatza" class="dropdown-item" href="#">Coatzacoalcos</a>
                                    <a id="selectUserMina" class="dropdown-item" href="#">Minatitlan</a>
                                    <a id="selectUserPuebla" class="dropdown-item" href="#">Puebla</a>
                                    <a id="selectUserPozaRica" class="dropdown-item" href="#">Poza Rica</a>
                                    <a id="selectUserVeracruz" class="dropdown-item" href="#">Veracruz</a>
                                    <a id="selectUserXalapa" class="dropdown-item" href="#">Xalapa</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="tituloUsuarios" class="alert alert-info" role="alert">
                                Mostrando Usuarios de:
                            </div>
                        </div>
                        <div id="userAlerts" class="col-md-4">

                        </div>
                    </div>

                    <!-- Titulos -->
                    <div class="row">

                        <!-- Region -->
                        <div class="col-md-2">
                            Usuarios
                        </div>

                        <!-- Usuarios -->
                        <div class="col-md-6">

                        </div>

                        <div class="col-md-2">
                            Acciones
                        </div>

                    </div>

                    <div class="row">
                        <!-- Lista de usuarios -->
                        <div class="col-md-2">
                            <div id="listaUsuarios" class="list-group">
                                <a href="#" class="list-group-item list-group-item-action active">
                                    Usuarios
                                </a>
                            </div>
                        </div>
                        <!-- /Lista de usuarios -->
                        <!-- Usuarios -->
                        <div class="col-md-6">
                            <form>
                                <!-- Formulario  -->
                                <div class="form-group">
                                    <label for="userFullName">Nombre</label>
                                    <input type="text" class="form-control" id="userFullName" aria-describedby="emailHelp" disabled>
                                    <br>
                                    <label for="userName">User / Email address</label>
                                    <input type="email" class="form-control" id="userName" aria-describedby="emailHelp" disabled>
                                    <br>
                                    <!-- Region DropDown  -->
                                    <label for="userRegion">Region</label>
                                    <div class="dropdown">
                                        <button id="userRegion" class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
                                            Region
                                        </button>
                                        <div id="editRegion" class="dropdown-menu" aria-labelledby="userRegion">
                                            <a id="editUserCoa" class="dropdown-item" href="#">Coatepec</a>
                                            <a id="editUserCordoba" class="dropdown-item" href="#">Cordoba</a>
                                            <a id="editUserCoatza" class="dropdown-item" href="#">Coatzacoalcos</a>
                                            <a id="editUserMina" class="dropdown-item" href="#">Minatitlan</a>
                                            <a id="editUserPuebla" class="dropdown-item" href="#">Puebla</a>
                                            <a id="editUserPozaRica" class="dropdown-item" href="#">Poza Rica</a>
                                            <a id="editUserVeracruz" class="dropdown-item" href="#">Veracruz</a>
                                            <a id="editUserXalapa" class="dropdown-item" href="#">Xalapa</a>
                                        </div>
                                    </div>
                                    <!-- /Region DropDown  -->
                                </div>
                                <!-- /Formulario  -->
                                <!-- Radio Buton USER  -->
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="radioUser" value="option1" disabled>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Usuario
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="radioAdmin" value="option2" disabled>
                                    <label class="form-check-label" for="exampleRadios2">
                                        Administrador
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 text-right">
                                        <button id="btnEditUser" type="button" onClick="userEdit()" class="btn btn-primary">Editar</button>
                                    </div>
                                </div>
                                <!-- /Radio Buton USER  -->
                            </form>
                        </div>
                        <!-- Botones Acciones  -->
                        <div class="col-md-4 text-center">
                            <!-- BTN Nuevo Ususario  -->
                            <button type="button" class="btn alert-success" data-toggle="modal" data-target="#nuevoUsuarioModal" data-whatever="@mdo">Nuevo Usuario</button>
                            <br>
                            <!-- BTN Editar Password  -->
                            <button onclick="editarPassword_setLabel()" type="button" class="btn alert-success m-3">Editar Password</button>
                            <br>
                            <!-- BTN Borrar Usuario  -->
                            <button onclick="validarUsuarioABorrar()" type="button" class="btn alert-danger m-3">Borrar Usuario</button>
                            <br>
                        </div>
                        <!-- /Botones Acciones  -->
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- Nuevo Usuario Modal -->
        <div class="modal fade" id="nuevoUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="nuevoUsuarioLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nuevoUsuarioLabel">Nuevo Usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="nuevoUsuario-name" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control alert-secondary" id="nuevoUsuario-name">
                            </div>
                            <div class="form-group">
                                <label for="nuevoUsuario-email" class="col-form-label">Correo:</label>
                                <input type="text" class="form-control alert-secondary" id="nuevoUsuario-email">
                            </div>
                            <div class="form-group">
                                <label for="nuevoUsuario-pass" class="col-form-label">Password:</label>
                                <input type="password" class="form-control alert-success" id="nuevoPass-email">
                            </div>
                            <div class="form-group">
                                <label for="nuevoUsuario-pass2" class="col-form-label">Confirmar Password:</label>
                                <input type="password" class="form-control alert-success" id="nuevoPass2-email">
                            </div>
                            <!-- DropDown -->
                            <div class="btn-group">
                                <button id="nuevoUsuario-drop" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Coatepec
                                </button>
                                <div id="lista" class="dropdown-menu">
                                    <a class="dropdown-item lista-item" href="#">Coatepec</a>
                                    <a class="dropdown-item lista-item" href="#">Cordoba</a>
                                    <a class="dropdown-item lista-item" href="#">Coatzacoalcos</a>
                                    <a class="dropdown-item lista-item" href="#">Minatitlan</a>
                                    <a class="dropdown-item lista-item" href="#">Puebla</a>
                                    <a class="dropdown-item lista-item" href="#">Poza Rica</a>
                                    <a class="dropdown-item lista-item" href="#">Veracruz</a>
                                    <a class="dropdown-item lista-item" href="#">Xalapa</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item lista-item" href="#">Admin</a>
                                </div>
                            </div>
                            <!-- /DropDown -->
                            <!-- Alert -->
                            <div id="newUser-alert"></div>
                            <!-- /Alert -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button id="btnNewUser" onClick="newUser()" type="button" class="btn btn-primary">OK</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Ventana modal Confirmacion Borrar Usuario-->
        <div class="modal fade" id="confirmDeleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Realmente desea borrar este usuario?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 id="confirmDeleteUser-Label"></h5>
                        <div id="confirmDeleteUser-Alert"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button onclick="borrarUsuario()" type="button" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Ventaan modal Confirmacion Borrar Usuario-->

        <!-- Ventana modal Edicion de password -->
        <div class="modal fade" id="editPasswordModal" tabindex="-1" role="dialog" aria-labelledby="editPasswordModal-Label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPasswordModal-Label">Editar Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="editPasswordModal-name" class="col-form-label">Usuario:</label>
                                <input type="text" class="form-control" id="editPasswordModal-name" disabled>
                            </div>
                            <div class="form-group">
                                <label for="editPasswordModal-pass1" class="col-form-label">Password:</label>
                                <input type="password" class="form-control" id="editPasswordModal-pass1">
                            </div>
                            <div class="form-group">
                                <label for="editPasswordModal-pass2" class="col-form-label">Confirmar Password:</label>
                                <input type="password" class="form-control" id="editPasswordModal-pass2">
                            </div>
                            <div id="editPasswordModal-Alert"></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button onclick="editarPassword()" type="button" class="btn btn-primary">Cambiar Password</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Ventana modal Edicion de password -->

        <!-- Bootstrap core JavaScript -->
        <script src="js/jquery/jquery.min.js"></script>
        <script src="js/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="js/admin.js"></script>
        <script type="text/javascript" src="js/modal.js"></script>
        <script type="text/javascript" src="js/ajax_request.js"></script>

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>

</body>

</html>