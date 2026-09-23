<?php
require_once '../database/connect.php';
function relatorio($conexao)
{
    $sql = "SELECT * FROM alunos ORDER BY id";
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($alunos as $aluno) {
            echo "ID: {$aluno['id']}<br>";
            echo "nome: {$aluno['nome']}<br>";
            echo "turma: {$aluno['turma']}<br>";
            echo "email: {$aluno['email']}<br>";
            echo "nascimento: {$aluno['nascimento']}<br>";
            echo "ativo: {$aluno['ativo']}<br>";
            echo "<hr>";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}



function cadastrar($conexao, $nome, $turma, $nasc, $ativo, $email)
{
    $sql = "INSERT INTO alunos (nome, turma, nascimento, ativo, email) VALUES (:nome, :turma, :nascimento , :ativo, :email)";
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":turma",  $turma);
        $stmt->bindParam("nascimento",  $nasc);
        $stmt->bindParam(":ativo",  $ativo);
        $stmt->bindParam(":email",  $email);

        $stmt->execute();
        echo "Aluno Inserido com Sucesso!";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

function apagar($conexao, $id)
{
    $sql = "DELETE FROM alunos WHERE id = :id";
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        echo "Usuário $id Removido com sucesso";
    } catch (PDOException $e) {
        echo "ERRO: " . $e->getMessage();
    }
}

function consultar($conexao, $id)
{
    $sql = "SELECT nome,turma,nascimento,ativo FROM alunos WHERE id = :id";
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "Aluno: {$aluno['nome']} <br>";
        echo "Turma: {$aluno['turma']} <br>";

        echo "Nascimento: {$aluno['nascimento']} <br>";
        echo "Ativo: {$aluno['ativo']} <br>";
    } catch (PDOException $e) {
        echo "ERRO: " . $e->getMessage();
    }
}


function atualizar($conexao, $id, $nome, $turma, $nasc, $ativo, $email)
{
    $sql = "UPDATE alunos SET nome = :nome, turma = :turma, nascimento = :nascimento, ativo = :ativo, email = :email WHERE id = :id";
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":turma",  $turma);
        $stmt->bindParam("nascimento",  $nasc);
        $stmt->bindParam(":ativo",  $ativo);
        $stmt->bindParam(":email",  $email);

        $stmt->execute();
        echo "Aluno Atualizado com Sucesso!";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
