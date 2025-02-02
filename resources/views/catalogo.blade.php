<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Zapatos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-item img {
            height: 400px;
            object-fit: cover;
        }
        .carousel-caption {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: black;
            border-radius: 50%;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Catálogo de Zapatos</h1>
    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="ruta/a/imagen1.jpg" class="d-block w-100" alt="Zapato 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Zapato Deportivo</h5>
                    <p>Medidas: 38, 39, 40, 41</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="ruta/a/imagen2.jpg" class="d-block w-100" alt="Zapato 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Zapato Casual</h5>
                    <p>Medidas: 37, 38, 39, 40</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="ruta/a/imagen3.jpg" class="d-block w-100" alt="Zapato 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Zapato Formal</h5>
                    <p>Medidas: 40, 41, 42, 43</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>