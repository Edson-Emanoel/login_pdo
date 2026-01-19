<?php
    session_start();
    
    require('conexao.php');

    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $sql = "SELECT id, senha FROM usuarios WHERE usuario = :usuario LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":usuario", $usuario);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

        if(password_verify($senha, $dados['senha'])) {
            $_SESSION['usuario_id'] = $dados['id'];
            $_SESSION['usuario_nome'] = $usuario;
            $_SESSION['msg'] = "Login realizado com sucesso!";
            header("Location: restrita.php");
            exit();
        } else {
            $_SESSION['erro_login'] = "Senha incorreta.";
            header("Location: login.php");
            exit();
        }

    } else {
        $_SESSION['erro_login'] = "Usuário não encontrado.";
        header("Location: login.php");
        exit();
    }
?>