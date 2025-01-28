<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VITA</title>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General styles */
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 1030;
            background-color: #f8f9fa;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        main {
            flex: 1;
        }

        footer {
            flex-shrink: 0;
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

        /* Carrusel customizado */
        .carousel-inner img {
            max-width: 100%; /* Se asegura de que la imagen no se agrande más allá del ancho de su contenedor */
            max-height: 350px; /* Limita la altura de las imágenes para que no sean demasiado grandes */
            object-fit: contain; /* Se asegura de que la imagen se vea completa dentro del contenedor */
        }

        /* Separación y márgenes entre los elementos */
        .info-container {
            margin-bottom: 2rem; /* Espacio debajo del contenedor de información */
        }

        .carousel {
            margin-bottom: 2rem; /* Separación entre el carrusel y el contenido siguiente */
        }

        footer {
            margin-top: 2rem; /* Añadir espacio entre el contenido principal y el footer */
        }

        /* Estilo para el contenedor de Catálogo */
        .catalog-container {
            margin-top: 3rem;
            text-align: center;
        }

        /* Mapa y animación divididos en dos columnas */
        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .map-container {
            height: 400px;
            flex: 1;
        }

        .animation-container {
            height: 400px;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .animation-container img {
            max-width: 100%;
            max-height: 100%;
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
                    <h2>Zapatería de calzado deportivo</h2>
                    <p>Te podrás encontrar con una gran variedad de calzado deportivo para toda la familia.</p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="p-4 bg-light border rounded">
                    <h2>Los número 1 en calidad precio</h2>
                    <p>Deja de gastar en calzado de mala calidad. En nuestra zapatería encontrarás los mejores precios y calidad. Esperamos tu visita.</p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="p-4 bg-light border rounded">
                    <h2>Explora nuestro Catálogo</h2>
                    <p>Descubre todos los productos disponibles en nuestra tienda.</p>
                    <a href="{{ route('catalogo') }}" class="btn btn-primary">Ir al Catálogo</a>
                </div>
            </div>
        </div>

        <!-- Carrusel -->
        <div id="imageCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="storage/AirForce.jpg" class="d-block w-100" alt="Imagen 1">
                </div>
                <div class="carousel-item">
                    <img src="storage/AdidasDeportivos.jpg" class="d-block w-100" alt="Imagen 2">
                </div>
                <div class="carousel-item">
                    <img src="storage/Reebook.jpg" class="d-block w-100" alt="Imagen 3">
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

        <!-- Mapa y Animación Divididos -->
        <div class="row">
            <!-- Mapa -->
            <div class="col-6 map-container" id="map"></div>

            <!-- Animación Deportiva -->
            <div class="col-6 animation-container">
                <img src="https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExbXQ0dHN0bXhpYjBnMGI5em12eGgwcXJwOHQ1ajdiNXJoMXYyNWppMiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/26tOZVUbYt7CFf2Xm/giphy.gif" alt="Animación Deportiva">
            </div>
        </div>

    </main>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p class="mb-1">© 2025 Vita. Todos los derechos reservados.</p>
            <div>
                <a href="#" class="me-3">Facebook</a>
                <a href="#" class="me-3">Twitter</a>
                <a href="#" class="me-3">Instagram</a>
                <a href="#">Contacto</a>
            </div>
        </div>
    </footer>

    <script>
        // Función para inicializar el mapa
        function initMap() {
            // Coordenadas de la zapatería
            const ubicacion = { lat: 19.432608, lng: -99.133209 }; // Aquí pones la latitud y longitud reales
    
            // Crear el mapa y centrarlo en las coordenadas
            const map = L.map('map').setView([ubicacion.lat, ubicacion.lng], 30); // Nivel de zoom 14
    
            // Agregar el mapa base de OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
    
            // Agregar un marcador en la ubicación
            L.marker([ubicacion.lat, ubicacion.lng]).addTo(map)
                .bindPopup("<b>Zapatería Vita</b><br>Ubicación de nuestra tienda.")
                .openPopup();
        }
    
        // Llamar a la función para inicializar el mapa cuando se cargue la página
        window.onload = initMap;
    </script>
</body>
</html>
