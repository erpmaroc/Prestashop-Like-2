<?php
/**
 * Created by PhpStorm.
 * User: Bojidar Slaveykov
 * Date: 2/27/2020
 * Time: 12:50 PM
 */
namespace depexorPackages\Menu\TranslateTables;

use depexorPackages\Menu\Repositories\MenuRepository;
use depexorPackages\Multilanguage\TranslateTable;

class TranslateMenu extends TranslateTable {

    protected $relId = 'id';
    protected $relType = 'menus';

    protected $columns = [
        'title',
        'description',
    ];

    protected $repositoryClass = MenuRepository::class;
    protected $repositoryMethods = [
        'getById',
        'getMenusByParentId',
    ];
}
