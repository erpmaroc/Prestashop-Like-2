<?php

namespace depexorPackages\Multilanguage;


use Illuminate\Support\Facades\DB;
use depexorPackages\Option\Repositories\OptionRepository;

class MultilanguageHelpers
{

    public static $isEnabled = false;

    public static function multilanguageIsEnabled()
    {
        return self::$isEnabled;
    }

    public static function setMultilanguageEnabled($enabled)
    {
        return self::$isEnabled = $enabled;
    }

}
