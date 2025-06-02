<!-- app/views/task/rate.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificar Trabajo - CachueApp</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .rate-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            padding: 2rem;
            margin: 2rem auto;
            max-width: 600px;
            text-align: center;
        }

        .rate-header {
            margin-bottom: 2rem;
        }

        .rate-header i {
            font-size: 3rem;
            color: #764ba2;
        }

        .star-rating .fa-star {
            font-size: 2rem;
            cursor: pointer;
            color: #e4e5e9;
            transition: color 0.2s;
        }

        .star-rating .fa-star.checked {
            color: #f1c40f;
        }

        .btn-rate {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 1rem 2rem;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-rate:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
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
    <div class="rate-container">
        <div class="rate-header">
            <i class="fas fa-star"></i>
            <h2 class="mt-2">Calificar Trabajo Realizado</h2>
            <p class="text-muted">Califica al cachuelero por su trabajo en la tarea:<br><strong class="text-primary">"<?= htmlspecialchars($task->title) ?>"</strong></p>
        </div>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle me-2"></i><?= $error ?>
            </div>
        <?php endif; ?>

        <form method="POST">
            <input type="hidden" name="rating" id="rating" value="">

            <div class="mb-4">
                <p class="fw-bold mb-2"><i class="fas fa-thumbs-up me-2"></i>Tu calificación:</p>
                <div class="star-rating">
                    <i class="fas fa-star" data-value="1"></i>
                    <i class="fas fa-star" data-value="2"></i>
                    <i class="fas fa-star" data-value="3"></i>
                    <i class="fas fa-star" data-value="4"></i>
                    <i class="fas fa-star" data-value="5"></i>
                </div>
            </div>

            <div class="mb-4 text-start">
                <label class="form-label"><i class="fas fa-comment-dots me-2"></i>Comentario (opcional)</label>
                <textarea name="comment" class="form-control" rows="4" placeholder="¿Qué tal fue el servicio del cachuelero?"></textarea>
            </div>

            <button type="submit" class="btn btn-rate">
                <i class="fas fa-paper-plane me-2"></i>Enviar Calificación
            </button>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const stars = document.querySelectorAll('.star-rating .fa-star');
    const ratingInput = document.getElementById('rating');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const value = parseInt(star.getAttribute('data-value'));
            ratingInput.value = value;

            stars.forEach(s => {
                s.classList.remove('checked');
                if (parseInt(s.getAttribute('data-value')) <= value) {
                    s.classList.add('checked');
                }
            });
        });
    });
</script>
</body>
</html>
