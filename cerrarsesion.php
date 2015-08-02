<?php
	include("config.php"); /*Archivos de configuración de la bases de datos*/
	header("Content-Type: text/html;charset=utf-8");
    session_start();
    if (!isset($_SESSION['useracount']) || (trim($_SESSION['useracount']) !== '') ){
		session_unset();
		$_SESSION['useracount']='';
        $_SESSION['userpass']= '';
        session_destroy();
		header('Location: index.php');
		exit();
	}else{
		header('Location: index.php?inisesion=no');
	}
?>