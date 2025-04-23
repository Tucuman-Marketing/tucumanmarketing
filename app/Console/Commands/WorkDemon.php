<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;

class WorkDemon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'work:demon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'demonio work para ejecutar las colas';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Log::info("se ejecuto comando work");
        Artisan::call('queue:work');
    }
}
