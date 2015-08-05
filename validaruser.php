<?php
    if($_POST){
        include('config.php'); /*Archivos de configuración de la bases de datos*/
        $cuentauser = $_POST['userlogin1']; /*Nombre de usuario o cuenta de usuario, correo o nombre de usuario*/
        $passwroduser = md5($_POST['passuser1']);
        //Asignando las variables  de entorno de la bd

        $conexion = mysql_connect(HOST, USERNAME,PASSWORD) or die("No se pudo conectar con el servidor");
        mysql_select_db(DB, $conexion) or die("No se pudo conectar con la base de datos, revisar configuración.");
        

        $result = mysql_query("select * from usuarios where cuentauser='".$cuentauser."' and passwd='".$passwroduser."' and activated=0;", $conexion);
        //verificando si existen registros
        if($row = mysql_fetch_array($result)){
            session_start();
            /*en las variables globales de sesión usuario y pass almacena el nombre de usuario y la contraseña
            se puede acceder desde cualquier sección*/
            $_SESSION['useracount'] = $cuentauser;
            $_SESSION['userpass'] =  $passwroduser;
            /*realiza una consulta a mysql, extrayendo el nombre y apellido, de acuerdo al  nombre de usuario dado*/
            $result=mysql_query("select nomuser, apuser, fraseuser, iduser from usuarios where cuentauser='".$cuentauser."';", $conexion);
            while ($fila=mysql_fetch_array($result)) {
                /*extrae el nombre y el apellido y lo concatena en la variable global de sesión nomuser, para poder acceder a ella
                desde cualquier sección*/
                $_SESSION['nomuser'] = $fila["nomuser"];
                $_SESSION['apuser'] = $fila["apuser"];
                $_SESSION['frase'] = $fila["fraseuser"];
                $_SESSION['iduser'] = $fila["iduser"];
            }
            header('Location:dashboard.php');
        }else{
            $_SESSION['usuario']="";
            $_SESSION['pass']="";
            header('Location:index.php?inisesion=noid');
            exit();
        }
    }
?>