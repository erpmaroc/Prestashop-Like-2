<?php
namespace depexorPackages\Tag\Model;

use Illuminate\Support\Collection;
use depexorPackages\Database\Traits\CacheableQueryBuilderTrait;

/**
 * @package Conner\Tagging\Model
 *
 * @property string id
 * @property string slug
 * @property string name
 * @property-read Collection|Tag[] tags
 */
class TagGroup extends \Conner\Tagging\Model\TagGroup
{
    use CacheableQueryBuilderTrait;
}
