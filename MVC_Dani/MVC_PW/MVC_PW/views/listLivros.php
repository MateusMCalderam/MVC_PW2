<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Biblioteca</title>
</head>
<body>
    <h1>Listagem de Livros</h1>
    <a href="livro.php?destino=form">Incluir Nova</a>
    <a href="alunos.php?destino=list">Ver Alunos</a>
    <a href="retiradas.php?destino=list">Ver Retiradas</a>
    
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
                        <td><?php echo $livro->getIsbn(); ?></td>
                        <td>
                            <a href="livro.php?destino=form&id=<?php echo $livro->getId(); ?>">Editar</a>
                            <br>
                            <a href="livro.php?destino=remove&id=<?php echo $livro->getId(); ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
