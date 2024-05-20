<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importar Tablas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <style>
        .table th, .table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Importar Tablas</h3>
        <a href="{{ route('logout') }}" class="btn btn-danger">Log out</a>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>Tablas Disponibles</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tabla</th>
                        <th>Campos</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tables as $table => $columns)
                        <tr>
                            <td>{{ $table }}</td>
                            <td>{{ implode(', ', $columns) }}</td>
                            <td class="text-end">
                                <button class="btn btn-primary btn-sm">Importar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('menu.index') }}" class="btn btn-secondary">Volver al Menú</a>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>

