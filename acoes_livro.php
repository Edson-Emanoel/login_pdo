<?php

session_start();
require('conexao.php');

if (isset($_POST['salvar_livro'])) {

    $nome = $_POST['nome'];
    $donoId = $_SESSION['usuario_id'];

    // echo("Livro: " . $nome . " donoId: " . $donoId);
    // Comando para inserir no banco (agora com perfil_id)
    $sql = "INSERT INTO livro (nome, donoId) VALUES (:nome, :donoId)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":donoId", $donoId);
    
    if($stmt->execute()) {
        echo "Usuário criado com sucesso!";
        header("Location: ./livros.php");
    } else {
        echo "Erro ao criar usuário.";
    }
}
if (isset($_POST['editar_livro'])) {

    $nome   = $_POST['nome'];
    $livroId = $_POST['livro_id'];
    $donoId = $_SESSION['usuario_id'];

    $sql = "UPDATE livro 
            SET nome = :nome 
            WHERE id = :livroId 
              AND donoId = :donoId";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":livroId", $livroId, PDO::PARAM_INT);
    $stmt->bindParam(":donoId", $donoId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ./livros.php");
        exit;
    } else {
        echo "Erro ao editar livro.";
    }
}
if (isset($_POST['deletar_livro'])) {
    $livroId = $_GET['id'];
    $donoId  = $_SESSION['usuario_id'];

    $sql = "DELETE FROM livro 
            WHERE id = :livroId 
              AND donoId = :donoId";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':livroId', $livroId, PDO::PARAM_INT);
    $stmt->bindParam(':donoId', $donoId, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header("Location: ./livros.php");
        exit;
    } else {
        echo "Erro ao deletar livro.";
    }
}


?>