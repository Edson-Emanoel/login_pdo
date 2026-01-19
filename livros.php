<?php

require('conexao.php');
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
}

?>
<!doctype html>
<html lang="pt-BR">
    <head>
        <title>Livros</title>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <?php require('header.php') ?>
        <main class="container mt-4">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h1>Seus Livros</h1>

                <a href="criar_livro.php" class="btn btn-primary">
                    Cadastrar Livros
                </a>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Opções</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $donoIdV = $_SESSION['usuario_id'];

                        $sql = "SELECT id, nome FROM livro WHERE donoId = :donoIdV";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(':donoIdV', $donoIdV, PDO::PARAM_INT);
                        $stmt->execute();

                        $livros = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if (count($livros) === 0) {
                            echo '<tr><td colspan="3">Nenhum livro cadastrado.</td></tr>';
                        } else {
                            foreach ($livros as $livro) {
                                echo '<tr>';
                                echo '<td>' . $livro['id'] . '</td>';
                                echo '<td>' . htmlspecialchars($livro['nome']) . '</td>';
                                echo '<td class="d-flex gap-2">
                                        <a href="editar_livro.php?id=' . $livro['id'] . '" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="acoes_livro.php?id=' . $livro['id'] . '" method="POST">
                                            <a onclick="return confirm(\'Deseja excluir este livro?\')">
                                                <button class="btn btn-sm btn-danger" name="deletar_livro" type="submit">Excluir</button>
                                            </a>
                                        </form>
                                    </td>';
                                echo '</tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
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
