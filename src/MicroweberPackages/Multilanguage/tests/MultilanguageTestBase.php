<?php

namespace depexorPackages\Multilanguage\tests;

use \depexorPackages\Multilanguage\MultilanguageApi;

class MultilanguageTestBase extends \depexor\tests\TestCase
{
    protected function assertPreConditions(): void
    {
        if (!is_module('multilanguage')) {
            $this->markTestSkipped(
                'The Multilanguage module is not available.'
            );
        }
    }

}
