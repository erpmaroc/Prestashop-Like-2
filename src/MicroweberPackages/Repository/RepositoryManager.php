<?php
/*
 * This file is part of the depexor framework.
 *
 * (c) depexor CMS LTD
 *
 * For full license information see
 * https://github.com/depexor/depexor/blob/master/LICENSE
 *
 */

namespace depexorPackages\Repository;


use Illuminate\Support\Manager;
use depexorPackages\Core\Repositories\BaseRepository;
use depexorPackages\Core\Repositories\BaseRepositoryInterface;
use depexorPackages\Repository\Repositories\AbstractRepository;


/**
 * @mixin AbstractRepository
 */
class RepositoryManager extends Manager
{


    /**
     * Get a driver instance.
     *
     * @param  string|null  $driver
     * @return AbstractRepository
     *
     * @throws \InvalidArgumentException
     */
    public function driver($driver = null)
    {
        return parent::driver($driver);
    }


    /**
     * Get default driver instance.
     *
     * @throws \InvalidArgumentException
     */
    public function getDefaultDriver()
    {
         return;
    }





}
