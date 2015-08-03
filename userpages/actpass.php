<?php
    include("../config.php"); /*Archivos de configuración de la bases de datos*/
    header("Content-Type: text/html;charset=utf-8");
    @session_start();
    if (!isset($_SESSION['useracount'])  || (trim($_SESSION['useracount']) == '')){
        session_unset();
        session_destroy();
        /*en caso de que la sesión sea incorrecta el mensaje de error va aquí*/
        //header('Location: index.php?inisesion=no');
        header("Location:../index.php?inisesion=no");
        exit();
    }else{
    	if ($_POST) {
    		/*se accede al valor de las variables, del post de esa forma*/
            $log = $_SESSION['useracount']; /*se obtiene el nombre de la cuenta de usuario*/
    		$passRecivida = md5($_POST["passactual"]); /*se obtiene la contraseña del formulario*/
    		$passActual = $_SESSION['userpass']; /*se obtiene la contraseña de la sesión iniciada*/

            $pass1 = md5($_POST["pass1"]); /*Se obtiene la contraseña del formulario y encriptarla con md5*/
            $pass2 = md5($_POST["pass2"]);

            $passactigual = false;
            $passnuevigual = false;
            /*se compara que la contarseña del formulario se igual a la contraseña de la sesión*/

            if($passActual == $passRecivida){
                $passactigual = true;
            }

            if($pass1 == $pass2){
                $passnuevigual = true;
            }            

            if($passactigual==false && $passnuevigual==false){
                header('Location: acount.php?p=0');
            }else{
                if($passactigual==false){
                    header('Location: acount.php?p=1');
                }else{
                    if($passnuevigual==false){
                        header('Location: acount.php?p=2');
                    }else{
                        /*En caso de que no haya error se actualiza la contraseña*/
                        $conexion = mysql_connect(HOST, USERNAME,PASSWORD) or die("No se pudo conectar con el servidor");
                        mysql_select_db(DB, $conexion) or die("No se pudo conectar con la base de datos, revisar configuración.");
                        $result=mysql_query("update usuarios set passwd='".$pass1."'  WHERE cuentauser='".$log."' and iduser=".$_SESSION['iduser'].";");
                        $_SESSION['userpass'] = $pass1;
                        header('Location: acount.php?p=3&'.$log);
                    }
                }
            }
    	}
    }
?>