<?php

namespace depexorPackages\Order\Repositories;

use depexorPackages\Core\Repositories\BaseRepository;
use depexorPackages\Order\Events\OrderIsCreating;
use depexorPackages\Order\Events\OrderIsUpdating;
use depexorPackages\Order\Events\OrderWasCreated;
use depexorPackages\Order\Events\OrderWasDeleted;
use depexorPackages\Order\Events\OrderWasUpdated;
use depexorPackages\Order\Models\Order;

class OrderRepository extends BaseRepository
{

    public function __construct(Order $Order)
    {
        $this->model = $Order;
    }

    public function create($data)
    {
        event($event = new OrderIsCreating($data));

        $Order = $this->model->create($data);

        event(new OrderWasCreated($Order, $data));

        return $Order;
    }

    public function update($data, $id)
    {
        $Order = $this->model->find($id);

        event($event = new OrderIsUpdating($Order, $data));

        $Order->update($data);

        event(new OrderWasUpdated($Order, $data));

        return $Order;
    }


    public function delete($id)
    {
        $Order = $this->model->find($id);

        event(new OrderWasDeleted($Order));

        return $Order->delete();
    }


    public function destroy($ids)
    {
        event(new OrderWasDestroy($ids));

        return $this->model->destroy($ids);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

}
