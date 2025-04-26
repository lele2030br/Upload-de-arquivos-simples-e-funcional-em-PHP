<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'functions.php';

$message = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
                    }

                        $filename = basename($_FILES['file']['name']);
                            $uploadFile = $uploadDir . $filename;
                                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                                    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'mp4', 'mov', 'avi'];

                                        if ($_FILES['file']['error'] !== 0) {
                                                $message = "Erro interno no upload. Código: " . $_FILES['file']['error'];
                                                    } elseif (!in_array($ext, $allowed)) {
                                                            $message = "Tipo de arquivo não permitido.";
                                                                } elseif ($_FILES['file']['size'] > 100 * 1024 * 1024) {
                                                                        $message = "Arquivo excede 100MB.";
                                                                            } else {
                                                                                    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
                                                                                                $message = "Arquivo enviado com sucesso!";
                                                                                                            $success = true;
                                                                                                                    } else {
                                                                                                                                $message = "Falha ao mover o arquivo.";
                                                                                                                                        }
                                                                                                                                            }
                                                                                                                                            }
                                                                                                                                            ?>
                                                                                                                                            <!DOCTYPE html>
                                                                                                                                            <html lang="pt-BR">
                                                                                                                                            <head>
                                                                                                                                                <meta charset="UTF-8">
                                                                                                                                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                                                                                                                                        <title>Enviar Arquivo - myup</title>
                                                                                                                                                            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                                                                                                                                                            </head>
                                                                                                                                                            <body class="bg-light">

                                                                                                                                                            <div class="container mt-5">
                                                                                                                                                                <div class="card mx-auto" style="max-width: 500px;">
                                                                                                                                                                        <div class="card-body">
                                                                                                                                                                                    <h2 class="text-center mb-4">Enviar Arquivo</h2>
                                                                                                                                                                                                <form method="POST" enctype="multipart/form-data">
                                                                                                                                                                                                                <div class="mb-3">
                                                                                                                                                                                                                                    <input type="file" name="file" class="form-control" required>
                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                    <button type="submit" class="btn btn-success w-100">Enviar</button>
                                                                                                                                                                                                                                                                                </form>

                                                                                                                                                                                                                                                                                            <?php if($message): ?>
                                                                                                                                                                                                                                                                                                            <div class="alert <?php echo $success ? 'alert-success' : 'alert-danger'; ?> mt-3">
                                                                                                                                                                                                                                                                                                                                <?php echo $message; ?>
                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                            <?php endif; ?>

                                                                                                                                                                                                                                                                                                                                                                        <div class="d-flex justify-content-center mt-3">
                                                                                                                                                                                                                                                                                                                                                                                        <a href="index.php" class="btn btn-outline-primary">Voltar para Home</a>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                                </div>

                                                                                                                                                                                                                                                                                                                                                                                                                </body>
                                                                                                                                                                                                                                                                                                                                                                                                                </html>