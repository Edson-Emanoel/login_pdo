<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <header>
        <!--  -->
    </header>
    <main class="container mt-5">
        <h1>Login</h1>

        <?php
            if(isset($_SESSION['msg'])) {
                echo "<p>" . $_SESSION['msg'] . "</p>";
                unset($_SESSION['msg']);
            }
        ?>

        <form method="POST" action="valida_login.php">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuário:</label>
                <input autocomplete="off" type="text" name="usuario" id="usuario" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input autocomplete="off" type="password" name="senha" id="senha" class="form-control" required>
            </div>
            <?php
                if(isset($_SESSION['erro_login'])) {
                    echo "<p class='text-danger'>Usuário logado: " . $_SESSION['erro_login'] . "</p>";
                    unset($_SESSION['erro_login']);
                }
            ?>
            <button type="submit" class="btn btn-success">Entrar</button>
        </form>

    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>