<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="list.css">
    <title>Sistema Biblioteca</title>
</head>
<body>
    <nav class="navbar">
        <a href="mostraLivros.php">Ver Livros</a>
        <a href="mostraAlunos.php">Ver Alunos</a>
        <a href="mostraRetiradas.php">Ver Retiradas</a>
        <a href="formLivro.php">Adicionar Livro</a>
    </nav>
    <h1>Listagem de Alunos</h1>
    <a href="formAluno.php">Incluir Novo Aluno</a>
    <a href="mostraLivros.php">Ver Livros</a>
    <?php if (empty($alunos)): ?>
        <p>Nenhum aluno adicionado!</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data de Nascimento</th>
                    <th>Curso</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <td><?php echo $aluno->getNome(); ?></td>
                        <td><?php echo $aluno->getDataNasc(); ?></td>
                        <td><?php echo $aluno->getCurso(); ?></td>
                        <td><?php echo $aluno->getCpf(); ?></td>
                        <td>
                            <a href="formAluno.php?id=<?php echo $aluno->getId(); ?>">Editar</a>
                            <br>
                            <a href="excluirAluno.php?id=<?php echo $aluno->getId(); ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
