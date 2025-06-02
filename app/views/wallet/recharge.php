<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recargar Saldo - CachueApp</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .recharge-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            padding: 2rem;
            margin: 2rem auto;
            max-width: 600px;
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
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

        .btn-recharge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 1rem 2rem;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-recharge:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-secondary-custom {
            background: #6c757d;
            border: none;
            border-radius: 10px;
            padding: 1rem 2rem;
            font-weight: 600;
            color: white;
            text-decoration: none;
        }

        .btn-secondary-custom:hover {
            background: #5a6268;
            color: white;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="<?= BASE_URL ?>dashboard">
                <i class="fas fa-wallet me-2"></i>CachueApp
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link text-white" href="<?= BASE_URL ?>dashboard">
                    <i class="fas fa-arrow-left me-1"></i>Volver al Dashboard
                </a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="recharge-container">
            <!-- Header -->
            <div class="header">
                <i class="fas fa-credit-card"></i>
                <h2>Recargar Saldo</h2>
                <p class="text-muted">Agrega fondos a tu cuenta para pagar por tareas</p>
            </div>

            <!-- Mensajes -->
            <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-triangle me-2"></i><?= $error ?>
                </div>
            <?php endif; ?>

            <?php if (isset($success)): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i><?= $success ?>
                </div>
            <?php endif; ?>

            <!-- Formulario de recarga -->
            <form method="POST">
                <div class="mb-3">
                    <label for="amount" class="form-label fw-bold">
                        <i class="fas fa-dollar-sign me-2"></i>Monto a recargar
                    </label>
                    <input type="number" name="amount" id="amount" class="form-control" step="0.01" min="1" placeholder="Ingrese el monto" required>
                </div>

                <div class="d-flex gap-3 justify-content-center">
                    <a href="<?= BASE_URL ?>wallet/history" class="btn-secondary-custom">
                        <i class="fas fa-history me-2"></i>Ver Historial
                    </a>
                    <button type="submit" class="btn btn-recharge">
                        <i class="fas fa-plus-circle me-2"></i>Recargar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
