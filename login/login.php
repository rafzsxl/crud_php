<?php require_once __DIR__ . '/../includes/functions.php';?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
</head>

<?php include __DIR__ . '/../includes/header.php'; ?>
<hr>
<body>
    <main>
        <h1>Entre</h1>
        <form action="" method="post">
            <label for="email">E-mail:</label>
            <input type="text" name="email" id="email" placeholder="Insira o E-mail" required><br>
            <label type="senha">Senha:</label>
            <input type="password" name="senha" id="senha" placeholder="Insira a senha" required><br>
            <input type="submit" value="Entrar">
            <input type="reset" value="Limpar">
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $usuario = consulta_user($conexao, $_POST['email']);
                if ($usuario['email'] == $_POST['email'] && $usuario['senha'] == $_POST['senha']) {
                    session_start();
                    $_SESSION['id'] = $usuario['id'];
                    header("Location: ../index.php");
                    exit();
                } else{
                    echo "Usuário ou Senha Invalidos";
                    }
        }
        ?>
    </main>
</body>
<hr>
<?php include __DIR__ . '/../includes/footer.php'; ?>

</html>