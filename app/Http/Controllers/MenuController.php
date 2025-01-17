<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class MenuController extends Controller
{
    public function index()
    {
        return view('menu.index');
    }

    public function importarTablas()
    {
        $tables = [];
        $excludedFields = ['id', 'propietario', 'permiso_edicion', 'id_propietario'];

        // Ruta a las migraciones
        $migrationPath = database_path('migrations');

        // Obtener todos los archivos de migraciones
        $migrationFiles = File::allFiles($migrationPath);

        foreach ($migrationFiles as $file) {
            $filename = $file->getFilename();

            // Excluir migraciones específicas
            if (strpos($filename, 'create_users_table') === false && strpos($filename, 'create_cache_table') === false && strpos($filename, 'create_jobs_table') === false) {
                // Obtener el nombre de la tabla desde la migración
                $tableName = $this->getTableNameFromMigration($filename);

                if ($tableName && Schema::hasTable($tableName)) {
                    // Obtener columnas de la tabla
                    $columns = Schema::getColumnListing($tableName);
                    // Filtrar los campos excluidos
                    $filteredColumns = array_diff($columns, $excludedFields);
                    $tables[$tableName] = $filteredColumns;
                }
            }
        }

        return view('menu.importar', compact('tables'));
    }

    public function gestionarTablas()
    {
        return view('menu.gestionar');
    }

    private function getTableNameFromMigration($filename)
    {
        // Lógica para extraer el nombre de la tabla desde el archivo de migración
        if (preg_match('/create_(.*?)_table/', $filename, $matches)) {
            return $matches[1];
        }
        return null;
    }
}
