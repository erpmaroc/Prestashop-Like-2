<?php
namespace depexorPackages\Config;

use Illuminate\Support\ServiceProvider;

/**
 * Class ConfigSaveServiceProvider
 * @package depexorPackages\Config
 */

class ConfigSaveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
		$this->app->bind('Config', function($app){
			return new ConfigSave($app);
		});

        $this->app->alias('Config', ConfigSave::class);
    }
}
