<?php

namespace depexorPackages\Blog\Http\Controllers;

use Illuminate\Http\Request;
use depexorPackages\App\Http\Controllers\ModuleFrontController;
use depexorPackages\Content\Content;
use depexorPackages\Post\Models\Post;

class BlogController extends ModuleFrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $moduleId = $request->get('id');

        $postQuery = Post::query();

        $postResults = $postQuery->frontendFilter([
            'request'=>$request,
            'moduleId'=>$moduleId
        ]);

        return $this->view( 'blog::index', [
            'posts'=>$postResults,
            'moduleId'=>$moduleId
        ]);
    }

}
