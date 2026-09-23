<?php require_once __DIR__ . '/../includes/functions.php';?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se-Cadastre</title>
</head>

<?php include __DIR__ . '/../includes/header.php'; ?>
<hr>
<body>
    <main>
        <h1>Cadastro de Usuário</h1>
        <form action="" method="post">
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email" placeholder="Insira o E-mail" required><br>
            <label type="senha">Senha:</label>
            <input type="password" name="senha" id="senha" placeholder="Insira a senha" required><br>
            <input type="submit" value="Cadastrar">
            <input type="reset" value="Limpar">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            cadastra_user($conexao, $_POST['email'], $_POST['senha']); 
            header("Location: ../index.php");
            exit();
        }
        ?>
        
    </main>
</body>
<hr>
<?php include __DIR__ . '/../includes/footer.php'; ?>

</html>