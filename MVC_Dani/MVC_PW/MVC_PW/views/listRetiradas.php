<?php
function formatarData($data) {
    $date = new DateTime($data);
    return $date->format('d/m/Y');
}
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Biblioteca</title>
    <link rel="stylesheet" href="list.css">
</head>
<body>
<nav class="navbar">
    <h1>Sistema Biblioteca</h1>
    <span>
        <a href="mostraLivros.php">Livros</a>
        <a href="mostraAlunos.php">Alunos</a>
        <a href="mostraRetiradas.php" id="activate">Retiradas</a>
        <a href="formRetirada.php">Adicionar Retirada</a>
    </span>
    </nav>

    <h1>Cadastro de Retiradas</h1>
    <?php if (empty($retiradas)): ?>
        <p>Nenhuma retirada realizada!</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Nome Aluno</th>
                    <th>Nome Livro</th>
                    <th>Data Retirada</th>
                    <th>Data Devolução</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($retiradas as $retirada): ?>
                    <tr>
                        <td data-label="Nome Aluno"><?php echo $retirada->getNomeAluno(); ?></td>
                        <td data-label="Nome Livro"><?php echo $retirada->getNomeLivro(); ?></td>
                        <td data-label="Data Retirada"><?php echo formatarData($retirada->getDataRetirada()); ?></td>
                        <td data-label="Data Devolução"><?php echo formatarData($retirada->getDataDevolucao()); ?></td>
                        <td>
                            <a href="formRetirada.php?id=<?php echo $retirada->getId(); ?>">Editar</a>
                            <a href="excluirRetirada.php?id=<?php echo $retirada->getId(); ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
