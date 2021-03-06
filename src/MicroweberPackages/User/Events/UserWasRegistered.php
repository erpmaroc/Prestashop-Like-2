<?php

namespace depexorPackages\User\Events;

class UserWasRegistered
{
    /**
     * @var Model
     */
    private $model;
    private $data;

    public function __construct($model, array $data)
    {
        $this->model = $model;
        $this->data = $data;
    }

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return Data
     */
    public function getData()
    {
        return $this->data;
    }

}
