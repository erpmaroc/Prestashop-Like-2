<?php
namespace depexorPackages\Content;

use Illuminate\Support\ServiceProvider;
use depexorPackages\Content\TranslateTables\TranslateContent;
use depexorPackages\Content\TranslateTables\TranslateContentFields;
use depexorPackages\Database\Observers\BaseModelObserver;

/**
 * Class ConfigSaveServiceProvider
 * @package depexorPackages\Config
 */

class ContentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->translate_manager->addTranslateProvider(TranslateContent::class);
        $this->app->translate_manager->addTranslateProvider(TranslateContentFields::class);

        Content::observe(BaseModelObserver::class);
      //  Content::observe(CreatedByObserver::class);

        $this->loadMigrationsFrom(__DIR__ . '/migrations/');
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
    }
}
