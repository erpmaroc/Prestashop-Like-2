<?php



namespace depexor\Controllers;

use Illuminate\Routing\Controller;

class TestController extends Controller
{
    public function getIndex()
    {
        return;

        $a = new \depexor\Install\WebserverInstaller();
        $a = $a->run();
     
    }
}
