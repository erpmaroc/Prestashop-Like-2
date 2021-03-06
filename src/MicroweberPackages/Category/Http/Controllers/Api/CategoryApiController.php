<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 8/19/2020
 * Time: 4:09 PM
 */

namespace depexorPackages\Category\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use depexorPackages\App\Http\Controllers\AdminDefaultController;
use   depexorPackages\Category\Http\Requests\CategoryRequest;
use depexorPackages\Category\Repositories\CategoryRepositoryApi;

class CategoryApiController extends AdminDefaultController
{
    public $category;

    public function __construct(CategoryRepositoryApi $category)
    {
        $this->category = $category;

        parent::__construct();
    }

    /**
     * Display a listing of the product.\
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(CategoryRequest $request)
    {
        return (new JsonResource(
            $this->category
                ->filter($request->all())
                ->paginate($request->get('limit', 30))
                ->appends($request->except('page'))

        ))->response();


    }

    /**
     * Store product in database
     * @param CategoryRequest $request
     * @return mixed
     */
    public function store(CategoryRequest $request)
    {
        $result = $this->category->create($request->all());

        return (new JsonResource($result))->response();

    }

    /**
     * Display the specified resource.show
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $result = $this->category->find($id);
        return (new JsonResource($result))->response();

    }


    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CategoryRequest $request, $id)
    {

        $result = $this->category->update($request->all(), $id);

        return (new JsonResource($result))->response();

    }

    /**
     * Destroy resources by given ids.
     *
     * @param string $ids
     * @return void
     */
    public function delete($id)
    {
        $result = $this->category->delete($id);

        //      return (new JsonResource($result))->response();
        return true;
    }

    /**
     * Delete resources by given ids.
     *
     * @param string $ids
     */
    public function destroy($ids)
    {
        $result = $this->category->destroy($ids);
        return true;
        //     return (new JsonResource($result))->response();
    }

}
