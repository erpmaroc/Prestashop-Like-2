<?php
/**
 * Created by PhpStorm.
 * User: Bojidar Slaveykov
 * Date: 2/27/2020
 * Time: 12:50 PM
 */
namespace depexorPackages\Option\TranslateTables;

use depexorPackages\Multilanguage\TranslateTable;

class TranslateOption extends TranslateTable {

    protected $relId = 'id';
    protected $relType = 'options';

    protected $columns = [
        'option_value'
    ];

}
