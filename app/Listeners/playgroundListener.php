<?php

namespace App\Listeners;

use App\Events\playgroundEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class playgroundListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\playgroundEvent  $event
     * @return void
     */
    public function handle(playgroundEvent $event)
    {
        \Log::info('El evento playgroundEvent ha sido ejecutado');
    }
}
