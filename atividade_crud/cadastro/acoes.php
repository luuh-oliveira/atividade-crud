<?php

require("../database/conexao.php");

switch ($_POST["acao"]) {
    case 'inserir':
        //receber os dados
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $email = $_POST["email"];
        $celular = $_POST["celular"];

        //criar instrução sql
        $sql = "INSERT INTO tbl_pessoa (nome, sobrenome, email, celular) 
            VALUES ('$nome', '$sobrenome', '$email', '$celular')";

        //executar instrução
        $resultado - mysqli_query($conexao, $sql);

        header('location: index.php');

        break;

    case 'deletar':

        $pessoaId = $_POST["cod_pessoa"];

        $sql = "DELETE FROM tbl_pessoa WHERE cod_pessoa = $pessoaId";
        $resultado = mysqli_query($conexao, $sql);

        header("location: ../listagem/index.php");

        break;

    case 'editar':

        // - Direcionar o botão para o editar.php
        // - trazer o id da pessoa selecionada
        // - instrução sql para recuperar os dados
        // - criar case editar
        // - receber o id
        // - receber os dados dos inputs
        // - instrução sql de update


        $pessoaId = $_POST["pessoaId"];

        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $email = $_POST["email"];
        $celular = $_POST["celular"];

        $sql = "UPDATE tbl_pessoa SET nome = '$nome', 
            sobrenome = '$sobrenome', email = '$email', celular = '$celular'
            WHERE cod_pessoa = $pessoaId";

        $resultado = mysqli_query($conexao, $sql);

        header("location: ../listagem");

        break;

    default:
        # code...
        break;
}
