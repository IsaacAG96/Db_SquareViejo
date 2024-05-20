namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class ImportarController extends Controller
{
    public function index()
    {
        $tables = [];

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
                    $tables[$tableName] = $columns;
                }
            }
        }

        return view('importar.index', compact('tables'));
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
