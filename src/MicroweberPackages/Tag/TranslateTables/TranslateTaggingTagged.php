<?php
/**
 * Created by PhpStorm.
 * User: Bojidar Slaveykov
 * Date: 2/27/2020
 * Time: 12:50 PM
 */
namespace depexorPackages\Tag\TranslateTables;

use depexorPackages\Multilanguage\TranslateTable;

class TranslateTaggingTagged extends TranslateTable
{
    protected $relId = 'id';
    protected $relType = 'tagging_tagged';

    protected $columns = [
        'tag_name',
       // 'tag_slug',
        'tag_description'
    ];
}
