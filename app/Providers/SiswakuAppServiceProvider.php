<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class SiswakuAppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $halaman = '';
        
        if(Request::segment(1) == 'siswa'){
            $halaman = 'siswa';
        }elseif(Request::segment(1) == 'about'){
            $halaman = 'about';
        }

        view()->share('halaman', $halaman);

    }
}
