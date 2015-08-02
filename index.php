<!DOCTYPE html>
<html style="" lang="es-ES">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>M2 - Save My Password</title>
        <link REL="Shortcut Icon" HREF="img/icono.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="Sitio web persoanl del bloggero M2">
        <meta name="keywords" content="HTML, CSS, JS, JavaScript,m2, linuxitos, fedora, save password, cloud passpwrod, admin password, save, password">
        <meta name="author" content="Jesús Fernando Merino Merino and LiNuXiToS">

        <link href="css/metro.css" rel="stylesheet">
        <link href="css/metro-icons.css" rel="stylesheet">
        <link href="css/docs.css" rel="stylesheet">
        <link href="css/m2main.css" rel="stylesheet">

        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/metro.js"></script>
        <script src="js/docs.js"></script>
        <script src="js/prettify/run_prettify.js"></script>
        <script src="js/ga.js"></script>

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
        <div class="container page-content">
            <!--Sección del menú de la página principal sin usuarios logados-->
            <div class="app-bar fixed-top darcula">
                <div class="ali-der-menu span12">
                    <a class="app-bar-element branding selected"><span class="mif-home"> SaveMyPassword </span></a>
                    <span class="app-bar-divider"></span>
                    <ul class="app-bar-menu">
                    </ul>
                    <div class="place-right">
                        <ul class="app-bar-menu">
                            <li><a href="about.php" > <span class="mif-help"> Acerca de </span> </a> </li>
                        </ul>
                    </div>
                    <div class="app-bar-element place-right">
                        <a class="dropdown-toggle fg-white"><span class="mif-enter"></span> Iniciar Sesión</a>
                        <div class="app-bar-drop-container place-right" data-role="dropdown" data-no-close="true">
                            <div class="padding20">
                                <!-- form action="validar.php" method="post" data-role="validator" data-hint-mode="hint" data-hint-easing="easeOutBounce" -->
                                <form action="validaruser.php" method="post" data-role="validator" data-hint-mode="hint" data-hint-easing="easeOutBounce">
                                    <h4 class="text-light"> <span class="mif-enter"></span> Iniciar sesión...</h4>
                                    <div class="input-control text">
                                        <span class="mif-user prepend-icon"></span>
                                        <input type="text" id="userlogin1" name="userlogin1" data-validate-func="minlength"
                                        data-validate-arg="1" data-validate-hint-position="top">
                                        <span class="input-state-error mif-warning"></span>
                                    </div>
                                    <div class="input-control text">
                                        <span class="mif-lock prepend-icon"></span>
                                        <input type="password" id="passuser1" name="passuser1" data-validate-func="minlength"
                                        data-validate-arg="1" data-validate-hint-position="top">
                                        <span class="input-state-error mif-warning"></span>
                                    </div>
                                    <div class="form-actions">
                                        <input type="reset" name="reset" value="Limpiar" class="button bg-olive button large primary">
                                        <input type="submit" name="Submit" value="Guardar" class="button bg-green button large primary">
                                    </div>
                                    <a href="resetpasswd.php" class="fg-orange">¿Contraseña olvidada?</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Inicia contenido de la página principal, descripción de qué es mypassword-->
            <div class="bg-white cont-error-reg">
                <div class="grid condensed conten-descrip">
                    <div class="row cells5  bg-white">
                        <div class="cell colspan5">
                            <?php
                                include("config.php"); /*Archivos de configuración de la bases de datos*/
                                if (isset($_GET["error"])){
                                    if($_GET["error"]=="si"){
                                        echo "<span class=\"fg-red\">El usuario o la contraseña son incorrectos...</span>";
                                    }
                                }
                                if (isset($_GET["createuser"])){
                                    if($_GET["createuser"]=="si"){
                                        echo "<span class=\"fg-green\">La cuenta ha sido creada. ¡Ahora inicia sesión!</span>";
                                    }
                                }
                                if (isset($_GET["inisesion"])){
                                    if($_GET["inisesion"]=="no"){
                                        echo "<span class=\"fg-orange\"> Por favor inice sesión </span>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="grid condensed conten-descrip">
                    <div class="row cells5 ">
                        <div class="cell colspan3 bg-white">
                            <h1 class="text-bold fg-blue">
                                <span class="mif-cloud3"></span> Save My Password <span class="mif-cloud3"></span>
                            </h1>
                            <hr class="thin bg-grayLighter">
                            <div class="margin20 no-margin-left no-margin-right sub-header text-light fg-black">
                                    SaveMyPassword es un sitio web en dónde puedes guardar tus nombres de usuario y contraseña en la nube.
                                    De tal modo que puedas acceder a ellas con una sola contraseña maestra. En este sitio puedes agregar,
                                    borrar, actualizar fácilmente todas las contraseñas y usuarios que tengas.

                                    <hr class="thin bg-olive">

                                    Nunca más olvides tus contraseñas, mantenlas todas en un solo lugar.

                                    <br><br><br>
                                    Para utilizar las funcionalidades de este sito web, necesitas registrarte.<br>
                            </div>
                        </div>
                        <div class="cell colspan2">
                            <div class="example bf-blue">
                                <h1 class="text-light fg-green">Registrarse <span class="mif-user-plus"></span></h1>
                                <form action="savenewuseracount.php" method="post" data-role="validator"
                                                data-hint-mode="hint" data-hint-easing="easeOutBounce">
                                    <div class="input-control text alig-cont-reg" style="font-size:25px; height: 40px; width:300px;">
                                        <span class="mif-user prepend-icon"></span>
                                        <input id="username" name="username" style="font-size:20px; height: 34px; width:300px;"
                                        type="text" placeholder="Nombres" data-validate-func="minlength" data-validate-arg="1"
                                        data-validate-hint-position="top" value="<?php if (isset($_GET["username"])){ echo $_GET["username"];}?>">
                                        <span class="input-state-error mif-warning"></span>
                                    </div>
                                    <div class="input-control text alig-cont-reg" style="font-size:25px; height: 40px; width:300px;">
                                        <span class="mif-user prepend-icon"></span>
                                        <input id="lastname" name="lastname" style="font-size:20px; height: 34px; width:300px;"
                                        type="text" placeholder="Apellidos" data-validate-func="minlength" data-validate-arg="1"
                                        data-validate-hint-position="top" value="<?php if (isset($_GET["lastname"])){ echo $_GET["lastname"];}?>">
                                        <span class="input-state-error mif-warning"></span>
                                    </div>
                                    <?php
                                        if (isset($_GET["userexis"])){
                                            if($_GET["userexis"]=="si"){
                                                echo "<span class=\"fg-red\">La cuenta o email de usuario ya existe</span>";
                                            }
                                        }
                                    ?>
                                    <div class="input-control text alig-cont-reg" style="font-size:25px; height: 40px; width:300px;">
                                        <span class="mif-user prepend-icon"></span>
                                        <input id="email" name="email" style="font-size:20px; height: 34px; width:300px;"
                                        type="text" placeholder="Correo electrónico" data-validate-func="minlength" data-validate-arg="1"
                                        data-validate-hint-position="top" value="<?php if (isset($_GET["useracount"])){ echo $_GET["useracount"]; } ?>">
                                        <span class="input-state-error mif-warning"></span>
                                    </div>
                                    <?php
                                        if (isset($_GET["passiguales"])){
                                            if($_GET["passiguales"]=="no"){
                                                echo "<span class=\"fg-red\">Las contraseñas no coinciden</span>";
                                            }
                                        }
                                    ?>
                                    <div class="input-control password alig-cont-reg" style="font-size:25px; height: 40px; width:300px;">
                                        <span class="mif-lock prepend-icon"></span>
                                        <input name="pass" id="pass" style="font-size:20px; height: 34px; width:300px" type="password"
                                        value="" placeholder="Contraseña" data-validate-func="minlength" data-validate-arg="1"
                                        data-validate-hint-position="top">
                                        <span class="input-state-error mif-warning"></span>
                                    </div>
                                    <div class="input-control password alig-cont-reg" style="font-size:25px; height: 40px; width:300px;">
                                        <span class="mif-lock prepend-icon"></span>
                                        <input name="pass2" id="pass2" style="font-size:20px; height: 34px; width:300px" type="password"
                                        value="" placeholder="Repetir contraseña" data-validate-func="minlength" data-validate-arg="1" 
                                         data-validate-hint-position="top">
                                        <span class="input-state-error mif-warning"></span>
                                    </div>
                                    <div class="input-control text alig-cont-reg" style="font-size:25px; height: 40px; width:300px;">
                                        <span class="mif-user prepend-icon"></span>
                                        <input id="frase" name="frase" style="font-size:20px; height: 34px; width:300px;"
                                        type="text" placeholder="Correo electrónico" data-validate-func="minlength" data-validate-arg="1"
                                        data-validate-hint-position="top" value="<?php if (isset($_GET["frase"])){ echo $_GET["frase"]; } ?>">
                                        <span class="input-state-error mif-warning"></span>
                                    </div>

                                    <div class="margin10">
                                        <input type="submit" name="Submit" value="Registrarse" class="button bg-pass button large primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <footer>
                        <div class="bottom-menu-wrapper  fixed-bottom bg-white">
                            <div class="ali-der-menu span12">
                                <ul class="horizontal-menu compact">
                                    <li>
                                        <a target="_blanck" href="http://linuxgx.blogspot.mx/">&copy; 2015 SaveMyPassword - LiNuXiToS</a>
                                    </li>
                                    <li class="place-right">
                                        <a href="privacitymain.php">
                                            <span class="mif-security"> Privacidad </span>
                                        </a>
                                    </li>
                                    <li class="place-right"><a href="helpmain.php"> <span class="mif-help"> Ayuda </span> </a></li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>