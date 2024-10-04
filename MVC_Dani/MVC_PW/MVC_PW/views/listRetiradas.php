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
        <a href="mostraLivros.php">Ver Livros</a>
        <a href="mostraAlunos.php">Ver Alunos</a>
        <a href="mostraRetiradas.php">Ver Retiradas</a>
        <a href="formLivro.php">Adicionar Livro</a>
    </nav>

    <h1>Cadastro de Retiradas</h1>
    <a href="formRetirada.php">Incluir Nova</a>

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
                        <td data-label="Data Retirada"><?php echo $retirada->getDataRetirada(); ?></td>
                        <td data-label="Data Devolução"><?php echo $retirada->getDataDevolucao(); ?></td>
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
