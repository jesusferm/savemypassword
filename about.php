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
                    <a href="index.php" class="app-bar-element branding"><span class="mif-home"> SaveMyPassword </span></a>
                    <span class="app-bar-divider"></span>
                    <ul class="app-bar-menu">
                    </ul>
                    <div class="place-right">
                        <ul class="app-bar-menu">
                            <li><a href="index.php" > <span class="mif-user-plus"> Registrarse </span> </a> </li>
                            <li><a href="#" class="selected"> <span class="mif-help"> Acerca de </span> </a> </li>
                        </ul>
                    </div>
                    <div class="app-bar-element place-right">
                        <a class="dropdown-toggle fg-white"><span class="mif-enter"> Iniciar Sesión </span> </a>
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
            <div class="bg-white contenido">
                <div class="grid condensed conten-descrip">
                    <div class="row cells1 ">
                        <div class="cell colspan3 bg-white">
                            <h1 class="text-light fg-blue"> Acerca de SaveMyPassword<span class="mif-help place-right"></span></h1>
                            <hr class="thin bg-grayLighter">
                            <div class="cell">
                                <h3 class="fg-darker">SaveMyPassword es un sitio web que permite la administración de cuentas de usuarios y contraseñas en la nube.</h3>
                                <div class="fg-black">
                                    <h3> La página web del proyecto en GitHub es:</h3> <a target="_blank" href="https://github.com/jesusferm/savemypassword"><span class="mif-github mif-3x"></span></a>
                                </div>
                                <hr class="thin bg-red">
                                <h4 class="fg-green">Fue creado y desarrollado por <span>Fernando Merino</span>: Licenciado en Informática, interesado en
                                    <div>
                                        <span class="tag success">PHP</span>
                                        <span class="tag success">CSS</span>
                                        <span class="tag success">HTML</span>
                                        <span class="tag success">JavaScript</span>
                                        <span class="tag success">Java</span>
                                        <span class="tag success">MySQL</span>
                                        <span class="tag success">Git</span>
                                        <span class="tag success">Latex</span>
                                    </div>
                                </h4>
                                <div class="fg-darker">
                                    <h3> Las principales redes sociales del autor</h3>
                                        <a href="https://plus.google.com/u/0/112872357438242952092/" target="_blank" class="fg-black fg-hover-red"> <span class="mif-google-plus mif-3x"></span> </a>
                                        <a href="https://www.facebook.com/jesusfermm" target="_blank" class="fg-black fg-hover-blue"> <span class="mif-facebook mif-3x"> </a>
                                        <a href="https://twitter.com/FerFlit" target="_blank" class="fg-black fg-hover-blue"> <span class="mif-twitter mif-3x"> </a>
                                        <a href="https://www.youtube.com/user/gXferr/" target="_blank" class="fg-black fg-hover-red"> <span class="mif-youtube mif-3x"> </a>
                                        <a href="https://github.com/jesusferm" target="_blank" class="fg-black fg-hover-blue"> <span class="mif-github mif-3x"> </a>
                                        <a href="https://mx.linkedin.com/in/merinofernando" target="_blank" class="fg-black fg-hover-blue"> <span class="mif-linkedin mif-3x"></span> </a>
                                </div>
                                <br/><br/>
                                <div class="fg-dark">
                                    Este sitio web ha utilizando el framework de desarrollo en HTML Metro UI CSS 3.0, desarrollado por Sergey Pimenov <a target="_blank" href="http://metroui.org.ua/">Visitar sitio web</a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <footer>
                        <div class="bottom-menu-wrapper  fixed-bottom bg-white">
                        <div class="ali-der-menu span12">
                            <ul class="horizontal-menu compact">
                                <li><a target="_blanck" href="http://linuxgx.blogspot.mx/">&copy; 2015 SaveMyPassword - LiNuXiToS</a></li>
                                <li class="place-right"><a href="privacitymain.php"> <span class="mif-security"> Privacidad </span> </a></li>
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