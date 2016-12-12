<?php
    /*Archivos de configuración de la bases de datos*/
	include("includes/dbconfig.php");
	include("includes/mydbclass.php");
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
        $mydb = new myDBC();

        $userid = $mydb->obtenerCampo("iduser", "usuarios", " where cuentauser='".$useracount."' and fraseuser='".$frase."' and activated=0 ;");

        //$query = "select iduser from usuarios where activated=0 and cuentauser='".$useracount."';");

        if($userid!=""){
        	$fra  = $mydb->obtenerCampo("fraseuser", "usuarios", " where iduser=".$userid." and activated=0 ;");
			if($pass2==$pass1){
				$passiguales=true;
			}
			if ($fra==$frase) {
				$frasecorrect=true;
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
                            $sql = "update usuarios set passwd='".$pass1."'  WHERE cuentauser='".$useracount."' and iduser='".$userid."';";
            				$mydb->runQuery($sql);
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