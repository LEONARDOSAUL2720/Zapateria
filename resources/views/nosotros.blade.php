<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros - VITA</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .info-container {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .info-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        h2 {
            margin-bottom: 15px;
        }
        .back-button {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5 position-relative">
        <a href="{{ url()->previous() }}" class="btn btn-secondary back-button">Regresar</a>
        <h1 class="text-center mb-4">Sobre Nosotros</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="info-container">
                    <h2>Nuestra Historia</h2>
                    <p>En VITA, nos dedicamos a ofrecer el mejor calzado deportivo desde 1990. Nuestra misión es proporcionar productos de alta calidad que satisfagan las necesidades de nuestros clientes.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-container">
                    <h2>Nuestra Misión</h2>
                    <p>Nos esforzamos por ser líderes en el mercado de calzado deportivo, ofreciendo productos innovadores y un servicio excepcional a nuestros clientes.</p>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="info-container">
                    <h2>Visión</h2>
                    <p>Ser reconocidos como la mejor opción en calzado deportivo a nivel nacional e internacional, destacándonos por nuestra calidad y compromiso con el cliente.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-container">
                    <h2>Valores</h2>
                    <ul>
                        <li>Calidad</li>
                        <li>Innovación</li>
                        <li>Compromiso</li>
                        <li>Servicio al Cliente</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
