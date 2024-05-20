<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateListaCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Lista_Cuentas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_cuenta', 100);
            $table->string('usuario', 255);
            $table->string('contraseña', 255);
            $table->string('correo_electronico', 255);
            $table->timestamp('fecha_creacion')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('ultima_modificacion')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->integer('propietario');
            $table->string('permiso_edicion', 255);
            $table->integer('id_propietario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Lista_Cuentas');
    }
}
