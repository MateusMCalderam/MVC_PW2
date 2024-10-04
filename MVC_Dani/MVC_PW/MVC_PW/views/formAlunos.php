<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>Sistema Biblioteca</title>
</head>
<body>
    <h1>Cadastro de Alunos</h1>
    <div>
        <a href="mostraAlunos.php">Voltar para a listagem</a>
    </div>
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
        <option value="mat" <?php echo (isset($aluno) && $aluno->getCurso() == "mat") ? 'selected' : ''; ?>>Matemática</option>
        <option value="por" <?php echo (isset($aluno) && $aluno->getCurso() == "por") ? 'selected' : ''; ?>>Português</option>
        <option value="his" <?php echo (isset($aluno) && $aluno->getCurso() == "his") ? 'selected' : ''; ?>>História</option>
        <option value="geo" <?php echo (isset($aluno) && $aluno->getCurso() == "geo") ? 'selected' : ''; ?>>Geografia</option>
        <option value="cie" <?php echo (isset($aluno) && $aluno->getCurso() == "cie") ? 'selected' : ''; ?>>Ciências</option>
        <option value="art" <?php echo (isset($aluno) && $aluno->getCurso() == "art") ? 'selected' : ''; ?>>Artes</option>
        <option value="ing" <?php echo (isset($aluno) && $aluno->getCurso() == "ing") ? 'selected' : ''; ?>>Inglês</option>
        <option value="qui" <?php echo (isset($aluno) && $aluno->getCurso() == "qui") ? 'selected' : ''; ?>>Física</option>
        </select>
        <br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" value="<?php echo isset($aluno) ? $aluno->getCpf() : ''; ?>" placeholder="CPF" required>
        <br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
