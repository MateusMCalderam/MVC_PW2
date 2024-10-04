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
        <a href="mostraLivros.php" id="activate">Livros</a>
        <a href="mostraAlunos.php">Alunos</a>
        <a href="mostraRetiradas.php">Retiradas</a>
        <a href="formLivro.php">Adicionar Livro</a>
    </span>
    </nav>
    <h1>Listagem de Livros</h1>
    
    <?php if (empty($livros)): ?>
        <p>Nenhum livro adicionado!</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autores</th>
                    <th>Editora</th>
                    <th>Ano de Publicação</th>
                    <th>Quantidade de Exemplares</th>
                    <th>Quantidade de Exemplares Disponíveis</th>
                    <th>ISBN</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livros as $livro): ?>
                    <tr>
                        <td><?php echo $livro->getTitulo(); ?></td>
                        <td><?php echo $livro->getAutores(); ?></td>
                        <td><?php echo $livro->getEditora(); ?></td>
                        <td><?php echo $livro->getAnoPublicacao(); ?></td>
                        <td><?php echo $livro->getQuantidadeExemplares(); ?></td>
                        <td><?php echo $livro->getExemplaresDisponiveis(); ?></td>
                        <td><?php echo $livro->getIsbn(); ?></td>
                        <td>
                            <a href="formLivro.php?id=<?php echo $livro->getId(); ?>">Editar</a>
                            <br>
                            <a href="excluirLivro.php?id=<?php echo $livro->getId(); ?>">Excluir</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
