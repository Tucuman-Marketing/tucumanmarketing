<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ComandosController extends Controller
{
 
    public function index()
    {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        Artisan::call('optimize:clear');
    return 'La aplicación de Laravel ha sido optimizada.';
    }

    public function work()
    {
        //otr opcion
        $command = 'nohup php "G:\laragon\www\HelpDesk\artisan" queue:work >/dev/null 2>&1 &';
     
        exec($command);

        //Artisan::call('queue:work');
        return 'work ejecutado';
    }


}
