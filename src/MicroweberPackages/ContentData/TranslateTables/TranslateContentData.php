<?php
/**
 * Created by PhpStorm.
 * User: Bojidar Slaveykov
 * Date: 2/27/2020
 * Time: 12:50 PM
 */
namespace depexorPackages\ContentData\TranslateTables;

use depexorPackages\Multilanguage\TranslateTable;

class TranslateContentData extends TranslateTable {

    protected $relId = 'id';
    protected $relType = 'content_data';

    protected $columns = [
        'field_value'
    ];

}
