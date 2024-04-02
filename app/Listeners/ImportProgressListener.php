<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ImportProgress;

class ImportProgressListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ImportProgress $event)
    {
        // Almacena el progreso de la importación en la sesión
        session(['import_progress' => $event->progress]);
    }
}
