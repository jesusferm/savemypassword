<!DOCTYPE html>
<html style="" lang="es-ES">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>M2 - Save My Password</title>
        <link REL="Shortcut Icon" HREF="img/icono.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="Sitio web persoanl del bloggero M2">
        <meta name="keywords" content="HTML, CSS, JS, JavaScript,m2, linuxitos, fedora, web development">
        <meta name="author" content="Jesús Fernando Merino Merino and LiNuXiToS">

        <link href="css/metro.css" rel="stylesheet">
        <link href="css/metro-icons.css" rel="stylesheet">
        <!-- link href="css/docs.css" rel="stylesheet" -->
        <link href="css/m2main.css" rel="stylesheet">

        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/metro.js"></script>
        <script src="js/docs.js"></script>
        <script src="js/prettify/run_prettify.js"></script>
        <script src="js/ga.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>

        <style>
            .icon-list li {
                width: 23%;
                padding: .625rem;
                cursor: pointer;
                vertical-align: baseline;
                font-size: .9em;
            }
            .icon-list li:hover {
                background-color: #64b4db;
                color: #fff;
            }
            .icon-list li [class*=mif-] {
                font-size: 1.25rem;
                margin-right: 10px;
                color: #999;
            }
            .icon-list li:hover [class*=mif-] {
                color: #fff;
            }
        </style>
        <script>
        $(function(){
            $(window).on('resize', function(){
                if ($(this).width() <= 800) {
                    $(".sidebar").addClass('compact');
                } else {
                    $(".sidebar").removeClass('compact');
                }
            });
        });

        function pushMessage(t){
            var mes = 'Info|Implement independently';
            $.Notify({
                caption: mes.split("|")[0],
                content: mes.split("|")[1],
                type: t
            });
        }

        $(function(){
            $('.sidebar').on('click', 'li', function(){
                if (!$(this).hasClass('active')) {
                    $('.sidebar li').removeClass('active');
                    $(this).addClass('active');
                }
            })
        })
        </script>
    </head>
    <body background="img/back2.jpg">
        <?php
        include("config.php"); /*Archivos de configuración de la bases de datos*/
        header("Content-Type: text/html;charset=utf-8");
        @session_start();
        if (!isset($_SESSION['useracount'])  || (trim($_SESSION['useracount']) == '')){
            session_unset();
            session_destroy();
            /*en caso de que la sesión sea incorrecta el mensaje de error va aquí*/
            //header('Location: index.php?inisesion=no');
            header("Location:index.php?inisesion=no");
            exit();
        }else{/*en caso de que la sesión sea correcta*/
        ?>
        <div class="container page-content">
            <!--Sección del menú cuando el usuario se haya logeado-->
            <div class="app-bar fixed-top darcula" data-role="appbar">
                <a href="dashboard.php" class="app-bar-element branding selected"><span class="mif-home"> SaveMyPassword </span></a>
                <span class="app-bar-divider"></span>
                <ul class="app-bar-menu">
                    <li><a href="userpages/about.php" class="fg-white fg-hover-yellow"><span class="mif-help"></span> Acerca de</a></li>
                </ul>

                <div class="app-bar-element place-right">
                    <span class="dropdown-toggle uppercase"> <span class="mif-cog"></span> <?php echo ($_SESSION['nomuser']); ?></span>
                    <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow" data-role="dropdown" data-no-close="true" style="width: 220px">
                        <h2 class="text-light">Cuenta</h2>
                        <ul class="unstyled-list">
                            <li><a href="userpages/deleteacount.php" class="fg-white fg-hover-yellow"><span class="mif-security"></span> Securidad</a></li>
                            <li><a href="cerrarsesion.php" class="fg-white fg-hover-yellow"><span class="mif-exit"></span> Salir</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content cont-page-login bg-red colspan12" style="height: 620px; position: absolute; width:100%;">
            <div class="flex-grid" style="height: 100%;">
                <div class="row" style="height: 100%">
                    <div class="cell size-x200" id="cell-sidebar" style="background-color: #71b1d1; height: 100%">
                        <ul class="sidebar">
                            <li class="active">
                                <a href="#">
                                    <span class="mif-list icon"></span>
                                    <span class="title">Mostrar todo</span>
                                </a>
                            </li>
                            <li>
                                <a href="userpages/addpasswd.php">
                                    <span class="mif-key icon"></span>
                                    <span class="title">Agregar</span>
                                </a>
                            </li>
                            <li>
                                <a href="userpages/modifypasswd.php">
                                    <span class="mif-search icon"></span>
                                    <span class="title">Modificar</span>
                                </a>
                            </li>
                            <li>
                                <a href="userpages/acount.php">
                                    <span class="mif-cogs icon"></span>
                                    <span class="title">Cuenta</span>
                                </a>
                            </li>
                            <li>
                                <a href="userpages/help.php">
                                    <span class="mif-info icon"></span>
                                    <span class="title">Ayuda</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="cell auto-size padding20 bg-white">
                        <h1 class="text-light">Contraseñas almacenadas <span class="mif-list place-right"></span></h1>
                        <hr class="thin bg-grayLighter">
                        <form action="userpages/addacountfrommain.php" method="post" data-role="validator" data-hint-mode="hint" data-hint-easing="easeOutBounce">
                            <div class="grid">
                                <div class="row cells2">
                                    <div class="cell colspan2">
                                        <div class="input-control text full-size" data-role="input">
                                            <span class="mif-user prepend-icon"></span>
                                            <input id="cuentanueva" name="cuentanueva" type="text" placeholder="Cuenta o usuario" data-validate-func="minlength" data-validate-arg="1" data-validate-hint-position="top">
                                            <span class="input-state-error mif-warning"></span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="cell colspan2">
                                        <div class="input-control text full-size" data-role="input">
                                            <span class="mif-lock prepend-icon"></span>
                                            <input id="passcuenta" name="passcuenta" type="text" placeholder="Contraseña" data-validate-func="minlength" data-validate-arg="1" data-validate-hint-position="top">
                                            <span class="input-state-error mif-warning"></span>
                                        </div>
                                    </div>
                                    <div class="cell colspan3">
                                        <div class="input-control text full-size" data-role="input">
                                            <span class="mif-info prepend-icon"></span>
                                            <input id="descripcion" name="descripcion" type="text" placeholder="Descripción" data-validate-func="minlength" data-validate-arg="1" data-validate-hint-position="top">
                                            <span class="input-state-error mif-warning"></span>
                                        </div>
                                    </div>
                                    <div class="cell colspan2">
                                        <div class="input-control text full-size">
                                            <input type="submit" name="Submit" value="Agregar cuenta" class="button bg-pass button large primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table class="dataTable border bordered" data-role="datatable">
                            <thead>
                                <tr>
                                    <td style="width: 20px"></td>
                                    <td class="sortable-column sort-asc" style="width: 100px">ID</td>
                                    <td class="sortable-column">Nombre usuario</td>
                                    <td class="sortable-column">Descripción</td>
                                    <td class="sortable-column" style="width: 20px">Contraseña</td>
                                    <td style="width: 20px">¿Eliminar?</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $conexion = mysql_connect(HOST, USERNAME,PASSWORD) or die("No se pudo conectar con el servidor");
                                mysql_select_db(DB, $conexion) or die("No se pudo conectar con la base de datos, revisar configuración.");
                                
                                $result=mysql_query("select * from passwords where iduser=".$_SESSION['iduser']." and activated=0;",$conexion);

                                if ($row=mysql_num_rows($result)){
                                    $i=1;
                                    while($fila=mysql_fetch_array($result)){
                                ?> 
                                <tr>
                                    <td>
                                        <label class="input-control checkbox small-check no-margin">
                                            <input type="checkbox">
                                            <span class="check"></span>
                                        </label>
                                    </td>
                                    <td class="align-center"><a href=""><?php echo "$i"; ?></a></td>
                                    <td><?php echo $fila['nomcuenta']; ?></td>
                                    <td><?php echo $fila['descripcuenta']; ?></td>
                                    <td><?php echo $fila['passcuenta']; ?></td>
                                    <td class="align-center">
                                        <a href="userpages/delcount.php?<?php echo 'id='.$_SESSION['iduser'].'&cu='.$fila['nomcuenta']; ?>">Eliminar</a>
                                    </td>
                                </tr>
                                <?php
                                        $i++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="bottom-menu-wrapper  fixed-bottom bg-white">
                <div class="ali-der-menu span12">
                    <ul class="horizontal-menu compact">
                        <li><a target="_blanck" href="http://linuxgx.blogspot.mx/">&copy; 2015 SaveMyPassword - LiNuXiToS</a></li>
                        <li class="place-right"><a href="userpages/privacity.php"> <span class="mif-security"> Privacidad </span> </a></li>
                        <li class="place-right"><a href="userpages/help.php"> <span class="mif-help"> Ayuda </span> </a></li>
                    </ul>
                </div>
            </div>
        </footer>
        <?php
        }/*se cierra la condición en caso de que la sesión sí se haya realizado correctamente*/
        ?>
    </body>
</html>