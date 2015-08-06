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
                    <a href="index.php" class="app-bar-element branding selected"><span class="mif-home"> SaveMyPassword </span></a>
                    <span class="app-bar-divider"></span>
                    <ul class="app-bar-menu">
                    </ul>
                    <div class="place-right">
                        <ul class="app-bar-menu">
                            <li><a href="" > <span class="mif-help"> Acerca de </span> </a> </li>
                        </ul>
                    </div>
                    <div class="app-bar-element place-right">
                        <a class="dropdown-toggle fg-white"><span class="mif-enter"></span> Iniciar Sesión</a>
                        <div class="app-bar-drop-container place-right" data-role="dropdown" data-no-close="true">
                            <div class="padding20">
                                <!-- form action="validar.php" method="post" data-role="validator" data-hint-mode="hint" data-hint-easing="easeOutBounce" -->
                                <form action="dashboard.php" method="post" data-role="validator" data-hint-mode="hint" data-hint-easing="easeOutBounce">
                                    <h4 class="text-light"><span class="mif-enter"></span> Iniciar sesión...</h4>
                                    <div class="input-control text">
                                        <span class="mif-user prepend-icon"></span>
                                        <input type="text" id="userlogin1" name="userlogin1" data-validate-func="minlength" data-validate-arg="1" data-validate-hint-position="top">
                                        <span class="input-state-error mif-warning"></span>
                                    </div>
                                    <div class="input-control text">
                                        <span class="mif-lock prepend-icon"></span>
                                        <input type="password" id="password1" name="password1" data-validate-func="minlength" data-validate-arg="1" data-validate-hint-position="top">
                                        <span class="input-state-error mif-warning"></span>
                                    </div>
                                    <div class="form-actions">
                                        <input type="reset" name="reset" value="Limpiar" class="button bg-olive button large primary">
                                        <input type="submit" name="Submit" value="Iniciar" class="button bg-green button large primary">
                                    </div>
                                    <a href="resetpasswd.php" class="fg-orange">¿Contraseña olvidada?</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Inicia contenido de la página principal, descripción de qué es mypassword-->
            <div class="bg-white contenido">
                <div class="grid condensed conten-descrip">
                    <div class="row cells5 ">
                        <div class="cell colspan3 bg-white">
                            <h1 class="text-light fg-blue"> Ayuda <span class="mif-help place-right"></span></h1>
                            <hr class="thin bg-grayLighter">
                            <div class="cell">
                                <h5 class="fg-dark">Para iniciar en este sitio primero debes logearte, si ya tienes una cuenta ingresa a través del menú desplegable en la barra superior, en caso de que no, realiza los pasos siguientes:</h5>
                                <div class="row cells5">
                                    <ul class="numeric-list large-bullet green-bullet square-bullet">
                                        <li>Ingresa los datos que se piden, tu nombre (no tiene que ser real), tus apellidos (tampoco tiene que ser real).</li>
                                        <li>El correo de preferencia tiene que ser real, aunque puedes usar un nombre de usuario solamente, sin embargo para recuperar una contraseña sin correo será más complicado.</li>
                                        <li>Ingresa tu contraseña y confirma la misma, después de realizarlo clic en Registrase</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="cell colspan2">
                            <div class="example bf-blue">
                                <h1 class="text-light fg-green">Registrarse <span class="mif-user-plus"></span></h1>
                                <h5 class="text-bold fg-olive"> Es gratis y lo será siempre</h5><br>
                                <form action="validar.php" method="post" data-role="validator" data-hint-mode="hint" data-hint-easing="easeOutBounce">
                                    <div class="input-control text alig-cont-reg" style="font-size:25px; height: 40px; width:300px;">
                                        <span class="mif-user prepend-icon"></span>
                                        <input id="username" style="font-size:25px; height: 40px; width:300px;" name="username" type="text" placeholder="Nombres" data-validate-func="minlength" data-validate-arg="1" data-validate-hint-position="top">
                                        <span class="input-state-error mif-warning"></span>
                                        <span class="input-state-success mif-checkmark"></span>
                                    </div>
                                    <br>
                                    <div class="input-control text alig-cont-reg" style="font-size:25px; height: 40px; width:300px;">
                                        <span class="mif-user prepend-icon"></span>
                                        <input id="lastname" style="font-size:25px; height: 40px; width:300px;" name="lastname" type="text" placeholder="Apellidos" data-validate-func="minlength" data-validate-arg="1" data-validate-hint-position="top">
                                        <span class="input-state-error mif-warning"></span>
                                    </div>
                                    <br>
                                    <div class="input-control text alig-cont-reg" style="font-size:25px; height: 40px; width:300px;">
                                        <span class="mif-user prepend-icon"></span>
                                        <input id="email" name="email" style="font-size:25px; height: 40px; width:300px;" type="text" placeholder="Correo electrónico" data-validate-func="minlength" data-validate-arg="1" data-validate-hint-position="top">
                                        <span class="input-state-error mif-warning"></span>
                                    </div>
                                    <br>
                                    <div class="input-control password alig-cont-reg" style="font-size:25px; height: 40px; width:300px;">
                                        <span class="mif-lock prepend-icon"></span>
                                        <input style="font-size:25px; height: 40px; width:300px" name="pass" id="pass" type="password" value="" placeholder="Contraseña" data-validate-func="minlength" data-validate-arg="1" data-validate-hint-position="top">
                                        <span class="input-state-error mif-warning"></span>
                                    </div>
                                    <br>
                                    <div class="input-control password alig-cont-reg" style="font-size:25px; height: 40px; width:300px;">
                                        <span class="mif-lock prepend-icon"></span>
                                        <input style="font-size:25px; height: 40px; width:300px" name="pass" id="pass" type="password" value="" placeholder="Repetir contraseña" data-validate-func="minlength" data-validate-arg="1" 
                                         data-validate-hint-position="top">
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
                                <li><a target="_blanck" href="http://linuxgx.blogspot.mx/">&copy; 2015 SaveMyPassword - LiNuXiToS</a></li>
                                <li class="place-right"><a href="privacitymain.php"> <span class="mif-security"> Privacidad </span> </a></li>
                                <li class="place-right"><a href="#"> <span class="mif-help"> Ayuda </span> </a></li>
                            </ul>
                        </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>