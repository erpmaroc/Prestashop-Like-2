<?php

namespace depexorPackages\Product;

use Illuminate\Support\ServiceProvider;
use depexorPackages\Database\Observers\BaseModelObserver;
use depexorPackages\Product\Models\Product;
use depexorPackages\Product\Observers\ProductObserver;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Product::observe(BaseModelObserver::class);
      //  Product::observe(ProductObserver::class); ->moved to CustomFieldsTrait

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
    }

}
