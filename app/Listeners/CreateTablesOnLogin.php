<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;

class CreateTablesOnLogin
{
    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        if (!Schema::hasTable('Coleccion_Discos') || 
            !Schema::hasTable('Coleccion_Viajes') || 
            !Schema::hasTable('Agenda_Contactos') ||
            !Schema::hasTable('Lista_Compra') ||
            !Schema::hasTable('Lista_Programas') ||
            !Schema::hasTable('Lista_Cuentas')) {
            Artisan::call('migrate');
        }
    }
}
