<?php
/**
 * Created by PhpStorm.
 * Page: Bojidar
 * Date: 8/19/2020
 * Time: 2:53 PM
 */

namespace depexorPackages\Post\Observers;


use depexorPackages\Post\Models\Post;

class PostObserver
{
    /**
     * Handle the Page "saving" event.
     *
     * @param  \depexorPackages\Post\Models\Post  $post
     * @return void
     */
    public function saving(Post $post)
    {
        $post->content_type = 'post';
        
        cache_delete('content');
    }
}