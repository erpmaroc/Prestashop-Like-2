<?php

namespace depexorPackages\ContentFilter\Http\Controllers;


use Illuminate\Http\Request;
use depexorPackages\App\Http\Controllers\AdminController;

class ContentFilterAdminController extends AdminController
{

    public function index(Request $request)
    {
        return $this->view('content_filter::admin');

    }

    public function show()
    {

    }
}