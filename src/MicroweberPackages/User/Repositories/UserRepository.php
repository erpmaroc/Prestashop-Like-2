<?php

namespace depexorPackages\User\Repositories;

use depexorPackages\Core\Repositories\BaseRepository;
use depexorPackages\User\Events\UserIsCreating;
use depexorPackages\User\Events\UserIsUpdating;
use depexorPackages\User\Events\UserWasCreated;
use depexorPackages\User\Events\UserWasDeleted;
use depexorPackages\User\Events\UserWasUpdated;
use depexorPackages\User\Models\User;

class UserRepository extends BaseRepository
{

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function create($data)
    {
        event($event = new UserIsCreating($data));

        $user = $this->model->create($data);

        event(new UserWasCreated($user, $data));

        return $user;
    }

    public function update($data, $id)
    {
        $user = $this->model->find($id);

        event($event = new UserIsUpdating($user, $data));

        $user->update($data);

        event(new UserWasUpdated($user, $data));

        return $user;
    }


    public function delete($id)
    {
        $user = $this->model->find($id);

        event(new UserWasDeleted($user));

        return $user->delete();
    }


    public function destroy($ids)
    {
        event(new UserWasDestroy($ids));

        return $this->model->destroy($ids);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

}
