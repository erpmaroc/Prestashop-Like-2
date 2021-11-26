<?php

namespace depexorPackages\Product\Repositories;

use depexorPackages\Core\Repositories\BaseRepository;
use depexorPackages\Product\Events\ProductIsCreating;
use depexorPackages\Product\Events\ProductIsUpdating;
use depexorPackages\Product\Events\ProductWasCreated;
use depexorPackages\Product\Events\ProductWasDeleted;
use depexorPackages\Product\Events\ProductWasUpdated;
use depexorPackages\Product\Models\Product;

class ProductRepository extends BaseRepository
{

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function create($data)
    {
        event($event = new ProductIsCreating($data));

        $product = $this->model->create($data);

        event(new ProductWasCreated($product, $data));

        return $product;
    }

    public function update($data, $id)
    {
        $product = $this->model->find($id);

        event($event = new ProductIsUpdating($product, $data));

        $product->update($data);

        event(new ProductWasUpdated($product, $data));

        return $product;
    }


    public function delete($id)
    {
        $product = $this->model->find($id);

        event(new ProductWasDeleted($product));

        return $product->delete();
    }


    public function destroy($ids)
    {
        event(new ProductWasDestroy($ids));

        return $this->model->destroy($ids);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

}
