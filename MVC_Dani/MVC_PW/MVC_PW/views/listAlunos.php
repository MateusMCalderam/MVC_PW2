<?php
function getNomeCurso($cursoAbreviado) {
    $cursos = [
        'mat' => 'Matemática',
        'por' => 'Português',
        'his' => 'História',
        'geo' => 'Geografia',
        'cie' => 'Ciências',
        'art' => 'Artes',
        'ing' => 'Inglês',
        'qui' => 'Física'
    ];

    return isset($cursos[$cursoAbreviado]) ? $cursos[$cursoAbreviado] : 'Curso não encontrado';
}
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
    <link rel="stylesheet" href="list.css">
    <title>Sistema Biblioteca</title>
</head>
<body>
    <nav class="navbar">
        <h1>Sistema Biblioteca</h1>
        <span>
            <a href="mostraLivros.php">Livros</a>
            <a href="mostraAlunos.php" id="activate">Alunos</a>
            <a href="mostraRetiradas.php">Retiradas</a>
            <a href="formAluno.php">Adicionar Aluno</a>
        </span>
    </nav>
    <h1>Listagem de Alunos</h1>
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
                        <td><?php echo formatarData($aluno->getDataNasc()); ?></td>
                        <td><?php echo getNomeCurso($aluno->getCurso()); ?></td>
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
