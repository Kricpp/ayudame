<!-- app/views/task/apply.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postular a Tarea - CachueApp</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .apply-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            padding: 2rem;
            margin: 2rem auto;
            max-width: 700px;
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f8f9fa;
        }

        .header i {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 1rem;
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 0.8rem 1rem;
            margin-bottom: 1rem;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 1rem 2rem;
            font-weight: 600;
            color: white;
            width: 100%;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%)">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= BASE_URL ?>dashboard">
                <i class="fas fa-tools me-2"></i>CachueApp
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link text-white" href="<?= BASE_URL ?>dashboard">
                    <i class="fas fa-arrow-left me-1"></i>Volver al Dashboard
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="apply-container">
            <div class="header">
                <i class="fas fa-paper-plane"></i>
                <h2>Postular a Tarea</h2>
                <p class="text-muted">Envía tu propuesta al cliente</p>
            </div>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle me-2"></i><?= $error ?>
                </div>
            <?php endif; ?>

            <p><strong>Título:</strong> <?= htmlspecialchars($task->title) ?></p>
            <p><strong>Cliente:</strong> <?= htmlspecialchars($task->first_name . ' ' . $task->last_name) ?></p>
            <p><strong>Presupuesto:</strong> $<?= number_format($task->budget, 2) ?></p>

            <form action="<?= BASE_URL ?>task/apply/<?= $task->id ?>" method="post">
                <div class="mb-3">
                    <label for="proposal_message" class="form-label">Mensaje para el cliente</label>
                    <textarea name="proposal_message" id="proposal_message" class="form-control" rows="4" required placeholder="Cuéntale por qué eres ideal para esta tarea..."></textarea>
                </div>
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-paper-plane me-2"></i>Enviar postulación
                </button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

