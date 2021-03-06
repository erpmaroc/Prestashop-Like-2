<?php

namespace depexorPackages\Post;

use Illuminate\Support\ServiceProvider;
use depexorPackages\Database\Observers\BaseModelObserver;
use depexorPackages\Post\Models\Post;
use depexorPackages\Post\Observers\PostObserver;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(BaseModelObserver::class);
        Post::observe(PostObserver::class);

        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
    }

}
