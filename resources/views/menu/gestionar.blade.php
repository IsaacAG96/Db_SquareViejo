<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Tablas</title>
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
                <h3>Gestionar Tablas</h3>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($tablas as $tabla)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $tabla['nombre'] }}
                            <div>
                                <button class="btn btn-warning btn-sm">Editar</button>
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="mt-4">
                    {{ $tablas->links() }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
