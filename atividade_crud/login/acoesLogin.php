<?php

session_start();
require("./processa_login.php");

if (isset($_POST["txt_usuario"]) && isset($_POST["txt_senha"])) {

    $usuario = $_POST["txt_usuario"];
    $senha = $_POST["txt_senha"];

    realizarLogin($usuario, $senha, $conexao);
}

switch ($_POST["acao"]) {
    case 'logout':

        session_destroy();
        header("location: ../index.php");

        break;
        
    default:
        # code...
        break;
}

?>