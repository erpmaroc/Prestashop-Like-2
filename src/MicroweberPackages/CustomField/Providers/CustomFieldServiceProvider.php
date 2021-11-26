<?php
namespace depexorPackages\CustomField\Providers;

use Illuminate\Support\ServiceProvider;
use depexorPackages\CustomField\Models\CustomField;
use depexorPackages\CustomField\Repositories\CustomFieldRepository;
use depexorPackages\CustomField\TranslateTables\TranslateCustomFields;
use depexorPackages\CustomField\TranslateTables\TranslateCustomFieldsValues;


class CustomFieldServiceProvider extends ServiceProvider
{

    public function register()
    {
        /**
         * @property CustomFieldRepository $custom_field_repository
         */
        $this->app->bind('custom_field_repository', function () {
            return new CustomFieldRepository();
        });
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->translate_manager->addTranslateProvider(TranslateCustomFields::class);
        $this->app->translate_manager->addTranslateProvider(TranslateCustomFieldsValues::class);

       // CustomField::observe(CreatedByObserver::class);
    }
}
