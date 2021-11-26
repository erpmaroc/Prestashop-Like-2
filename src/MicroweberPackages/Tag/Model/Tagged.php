<?php

namespace depexorPackages\Tag\Model;

use depexorPackages\Database\Traits\CacheableQueryBuilderTrait;

/**
 * @package Conner\Tagging\Model
 *
 * @property integer id
 * @property string taggable_id
 * @property string taggable_type
 * @property string tag_name
 * @property string tag_slug
 * @property Tag tag
 */
class Tagged extends \Conner\Tagging\Model\Tagged
{
    use CacheableQueryBuilderTrait;
}
