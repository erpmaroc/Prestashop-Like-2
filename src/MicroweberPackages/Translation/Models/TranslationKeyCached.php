<?php

namespace depexorPackages\Translation\Models;



use depexorPackages\Database\Traits\CacheableQueryBuilderTrait;

class TranslationKeyCached extends TranslationKey
{
    use CacheableQueryBuilderTrait;
}
