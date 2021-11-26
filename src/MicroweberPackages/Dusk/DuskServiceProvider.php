<?php


namespace depexorPackages\Dusk;
use Illuminate\Support\ServiceProvider;
use depexorPackages\Dusk\Console\Commands\DuskServeCommand;


class DuskServiceProvider extends ServiceProvider
{
    public function register()
    {

        if (app()->environment() == 'testing') {

            if (\class_exists('\Laravel\Dusk\DuskServiceProvider')) {
                app()->register(\Laravel\Dusk\DuskServiceProvider::class);
                // php artisan dusk:serve --env=testing
               $this->commands(DuskServeCommand::class);
            }

        }
    }


}