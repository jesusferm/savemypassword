<?php
	/*Archivos de configuración de la bases de datos*/
	include("../includes/dbconfig.php");
	include("../includes/mydbclass.php");
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
    		$frase = $_POST["frase"];

            $mydb = new myDBC();
			$guardar="update usuarios set fraseuser='".$frase."'  WHERE cuentauser='".$log."' and iduser=".$_SESSION['iduser'].";";
			$mydb->runQuery($guardar);

            $_SESSION['frase'] = $frase;
            header('Location: acount.php?fr=1');
    	}
    }
?>