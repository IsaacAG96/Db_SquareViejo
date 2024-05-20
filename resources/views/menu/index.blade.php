<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Opciones</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Bienvenido, {{ Auth::user()->name }}</h3>
            @include('partials.logout-button')
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Menú de Opciones</h3>
            </div>
            <div class="card-body">
                <div class="list-group">
                    <a href="{{ url('/gestionarTablas') }}" class="list-group-item list-group-item-action">
                        Gestionar tablas
                    </a>
                    <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">
                        Crear una tabla
                    </a>
                    <a href="{{ url('/importarTablas') }}" class="list-group-item list-group-item-action">
                        Importar tablas
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
