<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VITA</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilo para mantener el header fijo */
        header {
            position: sticky;
            top: 0;
            z-index: 1030;
            background-color: #f8f9fa;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .info-container {
            margin-bottom: 2rem;
        }
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 2rem 0;
        }
        footer a {
            color: #fff;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Header fijo -->
    <header class="py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">VITA</h1>
            <div>
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm me-2">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Registrar</a>
            </div>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="container my-4">
        <!-- Contenedores de información dinámicos -->
        <div class="row info-container">
            <div class="col-md-7 mb-3">
                <div class="p-4 bg-light border rounded">
                    <h2>Zapateria de calzado deportivo</h2>
                    <p>
                        Te podras encontraa con una gran variedad de calzado deportivo para toda la familia.
                    </p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="p-4 bg-light border rounded">
                    <h2>Los nuemro 1 en calidad precio</h2>
                    <p>
                        Deja de gastar en calzado de mala calidad, en nuestra zapateria encontraras los mejores precios y calidad. Esperamos tu visita.
                    </p>
                </div>
            </div>
        </div>

        <!-- Carrusel -->
        <div id="imageCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../../storage/img/AirForce.jpeg" class="d-block w-100" alt="Imagen 1">
                </div>
                <div class="carousel-item">
                    <img src="../../storage/img/AdidasDeportivos.jpeg" class="d-block w-100" alt="Imagen 2">
                </div>
                <div class="carousel-item">
                    <img src="https://via.placeholder.com/1200x400" class="d-block w-100" alt="Imagen 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </main>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p class="mb-1">© 2025 Mi Proyecto. Todos los derechos reservados.</p>
            <div>
                <a href="#" class="me-3">Facebook</a>
                <a href="#" class="me-3">Twitter</a>
                <a href="#" class="me-3">Instagram</a>
                <a href="#">Contacto</a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
