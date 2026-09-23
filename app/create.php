<?php require_once '../includes/functions.php';?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>

<?php include '../includes/header.php'; ?>
<hr>
<body>
    <main>
        <h1>Cadastro de alunos</h1>
        <form action="" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" placeholder="Insira o Nome antes de cadastrar" required><br>
            <label type="turma">Turma:</label>
            <input type="text" name="turma" id="turma" placeholder="Insira a turma antes de se cadastrar" required><br>
            <label for="email">E-Mail:</label>
            <input type="email" name="email" id="email" placeholder="Insira o   E-Mail antes de atualizar" required><br>
            <label for="nasc">Nascimento</label>
            <input type="date" name="nasc" id="nasc" placeholder="Insira seu Nascimento antes de atualizar" required><br>
            <label for="ativo">Ativo</label><br>
            <input type="radio" name="ativo" id="ativo" value="true">
            <label for="ativo">SIM</label>
            <input type="radio" name="ativo" id="ativo" value="false">
            <label for="ativo">NÃO</label><br>
            <input type="submit" value="Cadastrar">
            <input type="reset" value="Limpar">""
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            cadastrar($conexao, $_POST['nome'], $_POST['turma'], $_POST['nasc'], $_POST['ativo'], $_POST['email']); 
        }
        ?>
        
    </main>
</body>
<hr>
<?php include '../includes/footer.php'; ?>

</html>