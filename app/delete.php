<?php require_once '../includes/functions.php';?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE</title>
</head>
<?php include '../includes/header.php'; ?>
<body>
    <h1>DELETE com formulário</h1>
    <main>
        <form action="" method="post">
            <label for="id">ID:</label>
            <input type="number" name="id" id="id" placeholder="Insira o ID para Apagar" required><br>
            <input type="submit" value="Apagar">
        </form>
        <?php 
        if ($_SERVER['REQUEST_METHOD'] =="POST") {
            apagar($conexao, $_POST['id']);
        } ?>
    </main>
<?php include '../includes/footer.php'; ?>
</body>
</html>