<?php

namespace depexorPackages\Content\Repositories;

use depexorPackages\Content\Content;
use depexorPackages\Content\Events\ContentWasDestroyed;
use depexorPackages\Core\Repositories\BaseRepository;
use depexorPackages\Content\Events\ContentIsCreating;
use depexorPackages\Content\Events\ContentIsUpdating;
use depexorPackages\Content\Events\ContentWasCreated;
use depexorPackages\Content\Events\ContentWasDeleted;
use depexorPackages\Content\Events\ContentWasUpdated;

class ContentRepositoryApi extends BaseRepository
{

    public function __construct(Content $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        event($event = new ContentIsCreating($data));

        $product = $this->model->create($data);

        event(new ContentWasCreated($product, $data));

        return $product;
    }

    public function update($data, $id)
    {
        $product = $this->model->find($id);

        event($event = new ContentIsUpdating($product, $data));

        $product->update($data);

        event(new ContentWasUpdated($product, $data));

        return $product;
    }


    public function delete($id)
    {
        $product = $this->model->find($id);

        event(new ContentWasDeleted($product));

        return $product->delete();
    }


    public function destroy($ids)
    {
        event(new ContentWasDestroyed($ids));

        return $this->model->destroy($ids);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

}
