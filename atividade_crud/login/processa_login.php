<?php

session_start();

require("../database/conexao.php");

function realizarLogin($usuario, $senha, $conexao)
{

    $sql = "SELECT * FROM tbl_usuario WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexao, $sql);

    $dadosUsuario = mysqli_fetch_array($resultado);

    if (
        isset($dadosUsuario["usuario"]) && isset($dadosUsuario["senha"])
        && $usuario == $dadosUsuario["usuario"] && $senha == $dadosUsuario["senha"]
    ) {

        $_SESSION["id"] = $dadosUsuario["id"];
        $_SESSION["nome"] = $dadosUsuario["usuario"];


        header("location: ../cadastro/index.php");
    } else {
        session_destroy();
        header("location: index.php");
    }
}

function verificarLogin()
{

    if (empty($_SESSION["id"])) {
        session_destroy();
        header("location: ../login/index.php");
    }
}

