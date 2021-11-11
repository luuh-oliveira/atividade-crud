<?php

include('../componentes/header.php');

require("../login/processa_login.php");
verificarLogin();

require("../database/conexao.php");

$sql = "SELECT * FROM tbl_pessoa";
$resultado = mysqli_query($conexao, $sql);

?>

<div class="container">

    <br />

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>E-mail</th>
                <th>Celular</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            <?php
            //listagem
            while ($pessoa = mysqli_fetch_array($resultado)) {
            ?>
                <tr>
                    <th><?= $pessoa["cod_pessoa"] ?></th>
                    <th><?= $pessoa["nome"] ?></th>
                    <th><?= $pessoa["sobrenome"] ?></th>
                    <th><?= $pessoa["email"] ?></th>
                    <th><?= $pessoa["celular"] ?></th>
                    <th>
                        <button class="btn btn-warning" onclick="javascript:window.location.href = '../cadastro/editar.php?pessoaId=<?= $pessoa['cod_pessoa'] ?>'">Editar</button>

                        <form id="form-deletar" action="../cadastro/acoes.php" method="post" style="display: inline;">
                            <input type="hidden" name="cod_pessoa" value="<?= $pessoa["cod_pessoa"] ?>">
                            <input type="hidden" name="acao" value="deletar" />
                            <button class="btn btn-danger">Excluir</button>
                        </form>

                    </th>
                </tr>

            <?php
            }
            ?>
        </tbody>

    </table>

</div>

<?php
include('../componentes/footer.php');
?>