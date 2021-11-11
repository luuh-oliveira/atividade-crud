<?php

include('../componentes/header.php');

require("../login/processa_login.php");
verificarLogin();

$pessoaId = $_GET["pessoaId"];

$sql = "SELECT * FROM tbl_pessoa WHERE cod_pessoa = $pessoaId";
$resultado = mysqli_query($conexao, $sql);
$pessoa = mysqli_fetch_array($resultado);

?>


<div class="container">
    <hr>
    <div class="card">
        <div class="card-header">
            <h2>Edição</h2>
        </div>
        <div class="card-body">
            <form method="post" action="./acoes.php">
            
                <input type="hidden" name="pessoaId" value="<?= $pessoaId ?>">
                <input type="hidden" name="acao" value="editar" />

                <input class="form-control" type="text" placeholder="Digite o nome" name="nome" id="nome" value="<?= $pessoa['nome'] ?>">
                <br />
                <input class="form-control" type="text" placeholder="Digite o sobrenome" name="sobrenome" id="sobrenome" value="<?= $pessoa['sobrenome'] ?>">
                <br />
                <input class="form-control" type="text" placeholder="Digite o email" name="email" id="email" value="<?= $pessoa['email'] ?>">
                <br />
                <input class="form-control" type="text" placeholder="Digite celular" name="celular" id="celular" value="<?= $pessoa['celular'] ?>">
                <br />
                <button class="btn btn-success">EDITAR</button>
            </form>
        </div>
    </div>
</div>


<?php
include('../componentes/footer.php');
?>