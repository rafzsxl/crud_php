<?php require_once '../includes/functions.php';?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar</title>
</head>
<?php include '../includes/header.php'; ?>
<hr>
<body>
    <h1>Consulte um Aluno em especifico</h1>
    <main>
        <form action="" method="post">
            <label for="id">ID:</label>
            <input type="number" name="id" id="id" placeholder="Insira o ID para consultar" required><br>
            <input type="submit" value="Consultar">
        </form>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] =="POST") {
            consultar($conexao, $_POST['id']);
        } ?>
    </main>
    <hr>
</body>
<?php include '../includes/footer.php'; ?>
</html>