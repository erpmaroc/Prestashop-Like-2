<?php

namespace depexorPackages\Page\Repositories;

use depexorPackages\Core\Repositories\BaseRepository;
use depexorPackages\Page\Events\PageIsCreating;
use depexorPackages\Page\Events\PageIsUpdating;
use depexorPackages\Page\Events\PageWasCreated;
use depexorPackages\Page\Events\PageWasDeleted;
use depexorPackages\Page\Events\PageWasUpdated;
use depexorPackages\Page\Models\Page;

class PageRepository extends BaseRepository
{
    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        event($event = new PageIsCreating($data));

        $page = $this->model->create($data);

        event(new PageWasCreated($page, $data));

        return $page;
    }

    public function update($data, $id)
    {
        $page = $this->model->find($id);

        event($event = new PageIsUpdating($page, $data));

        $page->update($data);

        event(new PageWasUpdated($page, $data));

        return $page;
    }

    public function delete($id)
    {
        $page = $this->model->find($id);

        event(new PageWasDeleted($page));

        return $page->delete();
    }


    public function destroy($ids)
    {
        event(new PageWasDestroy($ids));

        return $this->model->destroy($ids);
    }
}
