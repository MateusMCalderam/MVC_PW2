<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Biblioteca</title>
</head>
<body>
    <h1>Cadastro de Alunos</h1>
    <a href="mostraAlunos.php">Voltar para a listagem</a>
    <form action="salvaAluno.php" method="POST">
        <input type="hidden" name="id" value="<?php echo isset($aluno) ? $aluno->getId() : ''; ?>">
        
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo isset($aluno) ? $aluno->getNome() : ''; ?>" placeholder="Nome do aluno" required>
        <br>

        <label for="data_nasc">Data de Nascimento:</label>
        <input type="date" name="data_nasc" id="data_nasc" value="<?php echo isset($aluno) ? $aluno->getDataNasc() : ''; ?>" required>
        <br>

        <label for="curso">Cursos:</label>
        <select name="curso" required>
        <option value="" disabled selected>Escolha um curso:</option>
        <option value="mat">Matemática</option>
        <option value="por">Português</option>
        <option value="his">História</option>
        <option value="geo">Geografia</option>
        <option value="cie">Ciências</option>
        <option value="art">Artes</option>
        <option value="ing">Inglês</option>
        <option value="qui">Física</option>
        </select>
        <br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" value="<?php echo isset($aluno) ? $aluno->getCpf() : ''; ?>" placeholder="CPF" required>
        <br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
