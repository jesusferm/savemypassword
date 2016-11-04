<?php
    include("config.php"); /*Archivos de configuración de la bases de datos*/
	if ($_POST){
		/*se accede al valor de las variables, del post de esa forma*/
        $useracount = $_POST['username']; /*se obtiene el nombre de la cuenta de usuario*/
		$frase = $_POST["frase"];
        $pass1 = md5($_POST["passreset1"]);
        $pass2 = md5($_POST["passreset2"]);
        $userid = "";

        $userexist = false;
        $frasecorrect = false;
        $passiguales = false;

        /*Inicializando conexión a la base de datos.*/
        $conexion = mysql_connect(HOST, USERNAME,PASSWORD) or die("No se pudo conectar con el servidor");
        mysql_select_db(DB, $conexion) or die("No se pudo conectar con la base de datos, revisar configuración.");

        $usurexist = mysql_query("select iduser from usuarios where activated=0 and cuentauser='".$useracount."';", $conexion);
        while ($fila = mysql_fetch_array($usurexist)) {
            /*extrae el nombre y el lastnameellido y lo concatena en la variable global de sesión nomuser, para poder acceder a ella
            desde cualquier sección*/
            $userexist = true;
            $userid = $fila["iduser"]; /*clave primaria para poder actualizar información de contraseña*/
        }

        if($userexist==true){
            $fra = mysql_query("select fraseuser from usuarios where activated=0 and iduser=".$userid." and fraseuser='".$frase."';", $conexion);
            while ($fila = mysql_fetch_array($fra)) {
                /*extrae el nombre y el lastnameellido y lo concatena en la variable global de sesión nomuser, para poder acceder a ella
                desde cualquier sección*/
                $frasecorrect = true;
            }

            if($pass2==$pass1){
                $passiguales=true;
            }


            if($frasecorrect==false && $passiguales==false){
                header('Location: resetpasswd.php?fr=0&ps=0');
            }else{
                if($frasecorrect==false && $passiguales==true){
                    header('Location: resetpasswd.php?fr=0');
                }else{
                    if($frasecorrect==true && $passiguales==false){
                        header('Location: resetpasswd.php?ps=0');
                    }else{
                        if ($frasecorrect==true && $passiguales==true) {
                            $result=mysql_query("update usuarios set passwd='".$pass1."'  WHERE cuentauser='".$useracount."' and iduser='".$userid."';");
                            header('Location: resetpasswd.php?act=1');
                        }
                    }
                }
            }
        }else{
            header('Location: resetpasswd.php?ur=0');
        }

	}
?>