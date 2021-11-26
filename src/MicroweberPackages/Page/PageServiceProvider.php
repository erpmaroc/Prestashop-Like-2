<?php

namespace depexorPackages\Page;

use Illuminate\Support\ServiceProvider;
use depexorPackages\Database\Observers\BaseModelObserver;
use depexorPackages\Page\Models\Page;
use depexorPackages\Page\Observers\PageObserver;

class PageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Page::observe(BaseModelObserver::class);
        Page::observe(PageObserver::class);

        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
    }

}
