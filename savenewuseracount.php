<?php
include("config.php"); /*Archivos de configuración de la bases de datos*/
?>
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
        <meta name="description" content="Sitio web persoanl del buseracountgero M2">
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
                clastnametion: mes.split("|")[0],
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
<body>
	<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
    @session_start();
	/*SE PREGUNTA SI HAY DATOS EN EL POST*/
	if ($_POST) {
		/*se accede al valor de las variables, del post de esa forma*/
		$useracount    = $_POST["email"];
		$pass          = md5( $_POST["pass"]);
		$pass1	       = md5( $_POST["pass2"]);
		$username      = $_POST["username"];
		$lastname      = $_POST["lastname"];
		$frase         = $_POST["frase"];
    
        $usernoexiste  = false;
		$passwd        = false;

		$conexion = mysql_connect(HOST, USERNAME,PASSWORD) or die("No se pudo conectar con el servidor");
		mysql_select_db(DB, $conexion) or die("No se pudo conectar con la base de datos, revisar configuración.");

        /*Se valida que el nombre de la cuenta no exista*/
    	$usurexist = mysql_query("select cuentauser from usuarios where activated=0 and cuentauser='".$useracount."';", $conexion);
        while ($fila = mysql_fetch_array($usurexist)) {
            /*extrae el nombre y el lastnameellido y lo concatena en la variable global de sesión nomuser, para poder acceder a ella
            desde cualquier sección*/
            $usernoexiste = true;
        }

        if($pass==$pass1){
            $passwd = true;
        }

        /*Se valida que las contraseñas sean iguales*/
		if($passwd ==false && $usernoexiste == true){
            header("Location:index.php?userexis=si&passiguales=no&useracount=".$useracount."&username=".$username."&frase=".$frase."&lastname=".$lastname);
        }else{
            if($usernoexiste == true){
                header("Location:index.php?userexis=si&useracount=".$useracount."&username=".$username."&lastname=".$lastname."&frase=".$frase);
            }else{
                if ($passwd==false) {
                    header("Location:index.php?passiguales=no&useracount=".$useracount."&username=".$username."&lastname=".$lastname."&frase=".$frase);
                }
            }
        }
        /*En caso de que no exista el usuario y las contraseñas coincidan, entonces se agrega el usuario*/
        if($passwd==true && $usernoexiste == false){
	        $result=mysql_query("insert into usuarios (cuentauser, passwd, typeuser, fraseuser, activated, nomuser, apuser) 
                                    values('".$useracount."','".$pass."',0,'".$frase."',0,'".$username."','".$lastname."');");
	        if ($result){
                /*En caso de ser creado lo envía directo a inicio de sesión*/
				header("Location:index.php?createuser=si");
			}
		}
	}
	?>
</body>
</html>
