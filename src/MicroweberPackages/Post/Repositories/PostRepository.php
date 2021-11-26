<?php

namespace depexorPackages\Post\Repositories;

use depexorPackages\Core\Repositories\BaseRepository;
use depexorPackages\Post\Events\PostIsCreating;
use depexorPackages\Post\Events\PostIsUpdating;
use depexorPackages\Post\Events\PostWasCreated;
use depexorPackages\Post\Events\PostWasDeleted;
use depexorPackages\Post\Events\PostWasUpdated;
use depexorPackages\Post\Models\Post;

class PostRepository extends BaseRepository
{

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function create($data)
    {
        event($event = new PostIsCreating($data));

        $post = $this->model->create($data);

        event(new PostWasCreated($post, $data));

        return $post;
    }

    public function update($data, $id)
    {
        $post = $this->model->find($id);

        event($event = new PostIsUpdating($post, $data));

        $post->update($data);

        event(new PostWasUpdated($post, $data));

        return $post;
    }



}
