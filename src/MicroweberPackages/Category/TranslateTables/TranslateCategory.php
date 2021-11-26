<?php
/**
 * Created by PhpStorm.
 * User: Bojidar Slaveykov
 * Date: 2/27/2020
 * Time: 12:50 PM
 */
namespace depexorPackages\Category\TranslateTables;

use depexorPackages\Category\Repositories\CategoryRepository;
use depexorPackages\Multilanguage\TranslateTable;

class TranslateCategory extends TranslateTable {

    protected $relId = 'id';
    protected $relType = 'categories';

    protected $columns = [
        'url',
        'title',
        'description',
        'category_meta_title',
        'category_meta_keywords',
        'category_meta_description'
    ];

    protected $repositoryClass = CategoryRepository::class;
    protected $repositoryMethods = [
        'getById',
        'getByColumnNameAndColumnValue',
    ];
}
