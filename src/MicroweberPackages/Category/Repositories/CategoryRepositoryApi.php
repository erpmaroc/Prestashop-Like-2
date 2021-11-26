<?php

namespace depexorPackages\Category\Repositories;

use depexorPackages\Category\Events\CategoryWasDestroyed;
use depexorPackages\Core\Repositories\BaseRepository;
use depexorPackages\Category\Events\CategoryIsCreating;
use depexorPackages\Category\Events\CategoryIsUpdating;
use depexorPackages\Category\Events\CategoryWasCreated;
use depexorPackages\Category\Events\CategoryWasDeleted;
use depexorPackages\Category\Events\CategoryWasUpdated;
use depexorPackages\Category\Models\Category;

class CategoryRepositoryApi extends BaseRepository
{
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        event($event = new CategoryIsCreating($data));

        $category = $this->model->create($data);

        event(new CategoryWasCreated($category, $data));

        return $category;
    }

    public function update($data, $id)
    {
        $category = $this->model->find($id);

        if(!$category){
            return;
        }
        event($event = new CategoryIsUpdating($category, $data));

        $category->update($data);

        event(new CategoryWasUpdated($category, $data));

        return $category;
    }

    public function delete($id)
    {
        $category = $this->model->find($id);

        event(new CategoryWasDeleted($category));

        return $category->delete();
    }


    public function destroy($ids)
    {

        event(new CategoryWasDestroyed($ids));

        return $this->model->destroy($ids);
    }
}
