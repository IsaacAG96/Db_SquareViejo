<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importar Tablas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ url('/') }}" class="btn btn-secondary">Volver</a>
            @include('partials.logout-button')
        </div>
        <div class="card">
            <div class="card-header">
                <h3>Importar Tablas</h3>
            </div>
            <div class="card-body">
                @foreach($plantillas as $plantilla)
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>{{ $plantilla['nombre'] }}</h4>
                            <a href="{{ route('menu.importarPlantilla', ['nombre' => $plantilla['nombre']]) }}" class="btn btn-primary">Importar</a>
                        </div>
                        <ul class="list-group">
                            @foreach($plantilla['campos'] as $campo)
                                <li class="list-group-item">{{ $campo }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
                <div class="mt-4">
                    {{ $plantillas->links() }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
