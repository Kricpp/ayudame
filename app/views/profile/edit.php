<!-- app/views/profile/edit.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - CachueApp</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .profile-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 700px;
            margin: 3rem auto;
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

        .btn-edit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 15px;
            padding: 1rem 2rem;
            font-weight: 600;
            color: white;
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            margin-bottom: 1rem;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); margin-bottom: 0;">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold" href="<?= BASE_URL ?>dashboard">
            <i class="fas fa-tools me-2"></i> CachueApp
        </a>
        <div class="ms-auto">
            <a class="nav-link text-white" href="<?= BASE_URL ?>dashboard">
                <i class="fas fa-arrow-left me-1"></i>Volver al Dashboard
            </a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="profile-container">
        <div class="header">
            <i class="fas fa-user-edit"></i>
            <h2>Editar Perfil</h2>
            <p class="text-muted">Modifica tus datos y guarda los cambios</p>
        </div>

        <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i><?= $success ?>
            </div>
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i><?= $error ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Nombre *</label>
                    <input type="text" name="first_name" class="form-control" value="<?= $profile->first_name ?? '' ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Apellido *</label>
                    <input type="text" name="last_name" class="form-control" value="<?= $profile->last_name ?? '' ?>" required>
                </div>
            </div>

            <label class="form-label">Descripción</label>
            <textarea name="description" class="form-control" rows="3"><?= $profile->description ?? '' ?></textarea>

            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">DNI *</label>
                    <input type="text" name="dni" class="form-control" value="<?= $profile->dni ?? '' ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Teléfono *</label>
                    <input type="tel" name="phone" class="form-control" value="<?= $profile->phone ?? '' ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Ciudad *</label>
                    <input type="text" name="city" class="form-control" value="<?= $profile->city ?? '' ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Fecha de Nacimiento *</label>
                    <input type="date" name="birth_date" class="form-control" value="<?= $profile->birth_date ?? '' ?>" required>
                </div>
            </div>

            <label class="form-label">Teléfono Opcional</label>
            <input type="tel" name="optional_phone" class="form-control" value="<?= $profile->optional_phone ?? '' ?>">

            <button type="submit" class="btn btn-edit w-100 mt-3">
                <i class="fas fa-save me-2"></i>Guardar Cambios
            </button>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
