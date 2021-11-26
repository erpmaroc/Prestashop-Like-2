<?php
namespace depexorPackages\Blog\tests;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use depexorPackages\Blog\Http\Controllers\BlogController;
use depexorPackages\Content\Content;
use depexorPackages\Core\tests\TestCase;
use depexorPackages\Page\Models\Page;
use depexorPackages\Post\Models\Post;
use depexorPackages\Product\Models\Product;
use depexorPackages\Shop\Http\Controllers\ShopController;

class BlogFilterTest extends TestCase
{
    public function testGetPosts()
    {

        // Create dynamic page
        $newBlogPage = new Page();
        $newBlogPage->title = uniqid();
        $newBlogPage->content_type = 'page';
        $newBlogPage->subtype = 'dynamic';
        $newBlogPage->save();

        $blogPage = Page::where('id', $newBlogPage->id)->first();

        $moduleId = 'blog--mw--'. uniqid();

        save_option('content_from_id', $blogPage->id, $moduleId);

        $posts = [];

        for($i = 0; $i < 5; $i++) {

            $newPost = new Post();
            $newPost->title = uniqid();
            $newPost->parent = $blogPage->id;
            $newPost->save();

            $posts[] = $newPost;
        }

        $params = [];
        $params['id'] = $moduleId;

        $request = new \Illuminate\Http\Request();
        $request->merge($params);

        $controller = App::make(BlogController::class);
        $controller->setModuleParams($params);
        $controller->setModuleConfig([
            'module'=> 'blog'
        ]);
        $controller->registerModule();

        $html = $controller->index($request);
        $htmlString = $html->__toString();

        foreach ($posts as $post) {
            $findPostTitle = (strpos($htmlString, $post->title) !== false);
            $this->assertTrue($findPostTitle);
        }

        $findJs = (strpos($htmlString, 'filter.js') !== false);
        $this->assertTrue($findJs);

        $findCss = (strpos($htmlString, 'filter.css') !== false);
        $this->assertTrue($findCss);

    }
}
