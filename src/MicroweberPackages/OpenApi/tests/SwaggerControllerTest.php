<?php

namespace depexorPackages\OpenApi\tests;

use depexorPackages\Core\tests\TestCase;


class SwaggerControllerTest extends TestCase
{

    public function testIfSwaggerDocsJsonIsNotGivingError()
    {

        $swagger = app()->make('\depexorPackages\OpenApi\Http\Controllers\SwaggerController');
        $resp = $swagger->docs(request());
        $this->assertEquals(true, is_object($resp));
        $this->assertEquals(true, !empty($resp));
    }


}
