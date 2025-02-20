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
            object-fit: contain;
            width: 100%;
            margin-bottom: 10rem;
        }
        .carousel-caption {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 10;
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: black;
            border-radius: 50%;
        }
        .carousel-caption h5, .carousel-caption p {
            margin: 0;
        }
        .back-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <a href="{{ url('/') }}" class="btn btn-secondary back-button">Regresar</a>
    <h1 class="text-center mb-4">Catálogo de Zapatos</h1>
    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($imagenes as $index => $imagen)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $imagen) }}" class="d-block w-100" alt="Zapato {{ $index + 1 }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Zapato {{ $index + 1 }}</h5>
                        <p>Medidas: 38, 39, 40, 41</p>
                        <p>Precio: ${{ rand(1000, 3000) }}</p>
                        <p>Color: {{ ['Rojo', 'Azul', 'Verde', 'Negro', 'Blanco'][array_rand(['Rojo', 'Azul', 'Verde', 'Negro', 'Blanco'])] }}</p>
                        <p>Material: {{ ['Cuero', 'Sintético', 'Textil'][array_rand(['Cuero', 'Sintético', 'Textil'])] }}</p>
                    </div>
                </div>
            @endforeach
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