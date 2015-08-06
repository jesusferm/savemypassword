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
    	if ($_GET) {
    		/*se accede al valor de las variables, del post de esa forma*/
            $iduser = $_GET['id']; /*se obtiene el nombre de la cuenta de usuario*/
    		$nomcuenta = $_GET['cu'];

            /*En caso de que no haya error se actualiza la contraseña*/
            $conexion = mysql_connect(HOST, USERNAME,PASSWORD) or die("No se pudo conectar con el servidor");
            mysql_select_db(DB, $conexion) or die("No se pudo conectar con la base de datos, revisar configuración.");
            
            $result=mysql_query("update passwords set activated=1  WHERE nomcuenta='".$nomcuenta."' and iduser=".$iduser.";");

            header('Location: ../dashboard.php?d=0');
    	}
    }
?>