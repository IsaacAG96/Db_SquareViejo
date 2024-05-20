<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu.index');
    }

    public function gestionarTablas()
    {
        $tablas = [
            ['nombre' => 'Tabla 1'],
            ['nombre' => 'Tabla 2'],
            ['nombre' => 'Tabla 3'],
            ['nombre' => 'Tabla 4'],
            ['nombre' => 'Tabla 5'],
            ['nombre' => 'Tabla 6'],
            ['nombre' => 'Tabla 7'],
            ['nombre' => 'Tabla 8'],
            ['nombre' => 'Tabla 9'],
            ['nombre' => 'Tabla 10'],
            ['nombre' => 'Tabla 11'],
            ['nombre' => 'Tabla 12'],
        ];

        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($tablas, ($currentPage - 1) * $perPage, $perPage);
        $paginator = new LengthAwarePaginator($currentItems, count($tablas), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return view('menu.gestionar', ['tablas' => $paginator]);
    }

    public function importarTablas()
    {
        $plantillas = [
            ['nombre' => 'Plantilla 1', 'campos' => ['Campo 1', 'Campo 2', 'Campo 3']],
            ['nombre' => 'Plantilla 2', 'campos' => ['Campo A', 'Campo B', 'Campo C']],
            ['nombre' => 'Plantilla 3', 'campos' => ['Campo X', 'Campo Y', 'Campo Z']],
            ['nombre' => 'Plantilla 4', 'campos' => ['Campo M', 'Campo N', 'Campo O']],
            ['nombre' => 'Plantilla 5', 'campos' => ['Campo P', 'Campo Q', 'Campo R']],
            ['nombre' => 'Plantilla 6', 'campos' => ['Campo S', 'Campo T', 'Campo U']],
            ['nombre' => 'Plantilla 7', 'campos' => ['Campo V', 'Campo W', 'Campo X']],
        ];

        $perPage = 5;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($plantillas, ($currentPage - 1) * $perPage, $perPage);
        $paginator = new LengthAwarePaginator($currentItems, count($plantillas), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return view('menu.importar', ['plantillas' => $paginator]);
    }

    public function crearTablas()
    {
        return view('menu.crear');
    }

    public function importarPlantilla($nombre)
    {
        return "Plantilla '{$nombre}' importada con éxito.";
    }

    public function editarTabla($nombre)
    {
        return "Editando tabla '{$nombre}'.";
    }

    public function eliminarTabla($nombre)
    {
        return "Eliminando tabla '{$nombre}'.";
    }
}
