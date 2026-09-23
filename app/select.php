<?php 
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ .'/../login/verifica_user.php';?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
</head>

<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>
    <hr>
    <main>
        <?php relatorio($conexao); ?>
    </main>
    <?php  include __DIR__ . '/../includes/footer.php'; ?>

</body>

</html>