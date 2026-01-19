<?php
    session_start();    
    require('conexao.php');

    $livroId = $_GET['id'];
    $donoIdV = $_SESSION['usuario_id'];

    $sql = "SELECT id, nome 
            FROM livro 
            WHERE donoId = :donoIdV 
            AND id = :livroId";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':donoIdV', $donoIdV, PDO::PARAM_INT);
    $stmt->bindParam(':livroId', $livroId, PDO::PARAM_INT);
    $stmt->execute();

    $livro = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="pt-BR">
    <head>
        <title>Editar Livro</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <?php require('header.php') ?>
        <main class="container mt-3">
            <h2>Edite o Livro</h2>

            <form action="acoes_livro.php" method="POST">
                <input type="hidden" name="donoId" class="form-control" value="<?= $_SESSION['usuario_id'] ?>" />
                <input type="hidden" name="livro_id" value="<?= $livro['id'] ?>">

                <div class="mb-2">
                    <label for="nome">Nome do Livro</label>
                    <input type="text" name="nome" id="nome" class="form-control" value="<?= htmlspecialchars($livro['nome'] ?? '') ?>" />
                </div>
                
                <button class="btn btn-primary" type="submit" name="editar_livro">Editar Livro</button>
            </form>
        </main>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
