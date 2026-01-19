<?php
    require('conexao.php');

    $usuario = "edson";
    $senha_hash = password_hash("2020adm", PASSWORD_ARGON2I);

    $sql = "INSERT INTO usuarios (usuario, senha) VALUES (:usuario, :senha)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
    $stmt->bindParam(":senha", $senha_hash, PDO::PARAM_STR);
    
    if($stmt->execute()) {
        echo "Usuário criado com sucesso!";
    } else {
        echo "Erro ao criar usuário.";
    }
?>