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
        html,
        body {
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
            box-shadow: 0px 20px 20px rgba(0, 0, 0, 0.1);
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
            max-width: 100%;
            /* Se asegura de que la imagen no se agrande más allá del ancho de su contenedor */
            max-height: 450px;
            /* Limita la altura de las imágenes para que no sean demasiado grandes */
            object-fit: contain;
            /* Se asegura de que la imagen se vea completa dentro del contenedor */
        }

        /* Separación y márgenes entre los elementos */
        .info-container {
            margin-bottom: 10rem;
            /* Espacio debajo del contenedor de información */
            box-shadow: 30px 20px 20px rgba(0, 0, 0, 0.1);
        }

        .carousel {
            margin-bottom: 10rem;
            /* Separación entre el carrusel y el contenido siguiente */

        }

        footer {
            margin-top: 2rem;
            /* Añadir espacio entre el contenido principal y el footer */
        }

        /* Estilo para el contenedor de Catálogo */
        .catalog-container {
            margin-top: 3rem;
            text-align: center;
        }

        /* Mapa y animación divididos en dos columnas */
        /* Mapa y animación divididos en dos columnas */
        .row {
            display: flex;
            flex-wrap: wrap;

        }

        .row-map {
            display: flex;
            flex-wrap: wrap;
            margin-top: 10rem
        }

        .map-container {
            height: 350px;
            flex: 1;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 2rem;
            margin-right: 2rem;
        }

        .animation-container {
            height: 350px;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 1rem;
            margin-right: 2rem;

        }

        .animation-container img {
            max-width: 80%;
            max-height: 80%;
            animation: zoomInOut 4s ease-in-out infinite;
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
                    <h2>Zapatería de Calzado Deportivo</h2>
                    <p>Encuentra una gran variedad de calzado deportivo para todas las edades y necesidades. Desde tenis
                        para correr hasta calzado para actividades de alto rendimiento, tenemos todo lo que buscas.</p>
                    <ul>
                        <li><strong>Running:</strong> Tenis de alta resistencia para largas distancias.</li>
                        <li><strong>Fútbol:</strong> Botas con tecnología de tracción avanzada.</li>
                        <li><strong>Casual:</strong> Sneakers cómodos para el día a día.</li>
                    </ul>
                    <p><strong>Visítanos y prueba tu par ideal.</strong></p>

                </div>
            </div>
            <div class="col-md-5">
                <div class="p-4 bg-light border rounded">
                    <h2>Los número 1 en Calidad y Precio</h2>
                    <p>Deja de gastar en calzado de mala calidad. En nuestra zapatería encontrarás los mejores precios
                        con la garantía de un producto duradero y cómodo. ¡No más sacrificios entre calidad y precio!
                    </p>
                    <p><strong>Ofertas exclusivas:</strong> Descuentos de temporada y promociones especiales para
                        miembros registrados.</p>
                    <p><strong>Compra fácil:</strong> Compra en línea o visítanos en nuestra tienda física.</p>
                    <p>¡Te esperamos con los mejores precios!</p>

                </div>
            </div>
            <div class="col-md-5">
                <div class="p-4 bg-light border rounded">
                    <h2>Explora nuestro Catálogo</h2>
                    <p>Descubre todos nuestros productos disponibles y encuentra lo que más te gusta. ¡Explora calzado
                        para deporte, fitness, moda y más!</p>
                    <ul>
                        <li><strong>Productos destacados:</strong> Tenis para running, zapatillas de fútbol y sneakers
                            exclusivos.</li>
                        <li><strong>Filtra por estilo y precio:</strong> Usa nuestros filtros avanzados para encontrar
                            exactamente lo que buscas.</li>
                    </ul>
                    <a href="{{ route('catalogo') }}" class="btn btn-primary">Ir al Catálogo</a>
                    <p><strong>Oferta especial:</strong> Obtén un 10% de descuento en tu primer pedido al registrarte.
                    </p>

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
        <div class="row-map">
            <!-- Mapa -->
            <div class="col-6 map-container" id="map"></div>

            <!-- Animación Deportiva -->
            <div class="col-6 animation-container">
                <img src="https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExbXQ0dHN0bXhpYjBnMGI5em12eGgwcXJwOHQ1ajdiNXJoMXYyNWppMiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/26tOZVUbYt7CFf2Xm/giphy.gif"
                    alt="Animación Deportiva">
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Función para inicializar el mapa
        function initMap() {
            // Coordenadas de la zapatería
            const ubicacion = {
                lat: 19.432608,
                lng: -99.133209
            }; // Aquí pones la latitud y longitud reales

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
