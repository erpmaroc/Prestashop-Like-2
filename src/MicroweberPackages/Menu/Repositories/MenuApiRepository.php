<?php

namespace depexorPackages\Menu\Repositories;

use depexorPackages\Core\Repositories\BaseRepository;
use depexorPackages\Menu\Menu;
use depexorPackages\Menu\Events\MenuIsCreating;
use depexorPackages\Menu\Events\MenuIsUpdating;
use depexorPackages\Menu\Events\MenuWasCreated;
use depexorPackages\Menu\Events\MenuWasDeleted;
use depexorPackages\Menu\Events\MenuWasUpdated;
use depexorPackages\Menu\Models\Page;

class MenuApiRepository extends BaseRepository
{
    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        event($event = new MenuIsCreating($data));

        $page = $this->model->create($data);

        event(new MenuWasCreated($page, $data));

        return $page;
    }

    public function update($data, $id)
    {
        $page = $this->model->find($id);

        event($event = new MenuIsUpdating($page, $data));

        $page->update($data);

        event(new MenuWasUpdated($page, $data));

        return $page;
    }

    public function delete($id)
    {
        $page = $this->model->find($id);

        event(new MenuWasDeleted($page));

        return $page->delete();
    }


    public function destroy($ids)
    {
        event(new MenuWasDestroy($ids));

        return $this->model->destroy($ids);
    }
}
