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
    		/*se accede al valor de las variables, del post de esa forma*/
            $iduser = $_SESSION['iduser']; /*se obtiene el nombre de la cuenta de usuario*/

            /*En caso de que no haya error se actualiza la contraseña*/
            echo "id".$iduser." nomcuent:".$nomcuenta;
            $mydb = new myDBC();
			$modificar="update passwords set activated=1  WHERE iduser=".$iduser.";";
			$mydb->runQuery($modificar);

			$modificar="update usuarios set activated=1  WHERE iduser=".$iduser.";";
			$mydb->runQuery($modificar);

            
            session_unset();
			session_destroy();
			/*en caso de que la sesión sea incorrecta el mensaje de error va aquí*/
			//header('Location: index.php?inisesion=no');
			header('Location: ../index.php');
			exit();
    }
?>