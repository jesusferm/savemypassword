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
    		$nomuser = $_POST["nomuser"];
            $apuser = $_POST["apuser"];

            /*En caso de que no haya error se actualiza la contraseña*/
            
            $mydb = new myDBC();
            $guardar="update usuarios set nomuser='".$nomuser."', apuser='".$apuser."'  WHERE cuentauser='".$log."' and iduser=".$_SESSION['iduser'].";";
            $mydb->runQuery($guardar);
            
            $_SESSION['nomuser'] = $nomuser;
            $_SESSION['apuser'] = $apuser;
            header('Location: acount.php?au=1');
    	}
    }
?>