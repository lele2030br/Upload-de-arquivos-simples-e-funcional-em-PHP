<?php
session_start();
$admin_user = "admin";
$admin_pass = "1234";

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] === $admin_user && $_POST['password'] === $admin_pass) {
            $_SESSION['loggedin'] = true;
                    header("Location: admin.php");
                            exit;
                                } else {
                                        $error = "Usuário ou senha inválidos.";
                                            }
                                            }
                                            ?>
                                            <!DOCTYPE html>
                                            <html lang="pt-BR">
                                            <head>
                                                <meta charset="UTF-8">
                                                    <title>Login Admin - myup</title>
                                                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                                                        </head>
                                                        <body class="bg-light">
                                                        <div class="container mt-5">
                                                            <div class="card mx-auto" style="max-width: 400px;">
                                                                    <div class="card-body">
                                                                                <h2 class="card-title text-center mb-4">Login Administrativo</h2>
                                                                                            <form method="POST">
                                                                                                            <div class="mb-3">
                                                                                                                                <input type="text" name="username" class="form-control" placeholder="Usuário" required>
                                                                                                                                                </div>
                                                                                                                                                                <div class="mb-3">
                                                                                                                                                                                    <input type="password" name="password" class="form-control" placeholder="Senha" required>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                                                                                                                                                                                                                                </form>
                                                                                                                                                                                                                                            <?php if(isset($error)) echo "<div class='alert alert-danger mt-3'>$error</div>"; ?>
                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                        </body>
                                                                                                                                                                                                                                                        </html>