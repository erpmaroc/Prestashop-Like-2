<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 8/19/2020
 * Time: 4:09 PM
 */
namespace depexorPackages\Page\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use depexorPackages\App\Http\Controllers\AdminDefaultController;
use depexorPackages\Page\Http\Requests\PageRequest;
use depexorPackages\Page\Repositories\PageRepository;

class PageApiController extends AdminDefaultController
{
    public $page;

    public function __construct(PageRepository $page)
    {
        $this->page = $page;
    }

    /**
     * Display a listing of the product.\
     *
     * @param PageRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (new JsonResource($this->page->all()))->response();
    }

    /**
     * Store product in database
     * @param PageRequest $request
     * @return mixed
     */
    public function store(PageRequest $request)
    {
        return (new JsonResource($this->page->create($request->all())));
    }

    /**
     * Display the specified resource.show
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return (new JsonResource($this->page->show($id)));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PageRequest $request
     * @param  string $id
     * @return Response
     */
    public function update(PageRequest $request, $id)
    {
        return (new JsonResource($this->page->update($request->all(), $id)));
    }

    /**
     * Destroy resources by given ids.
     *
     * @param string $ids
     * @return void
     */
    public function delete($id)
    {
        return (new JsonResource($this->page->delete($id)));
    }

    /**
     * Delete resources by given ids.
     *
     * @param string $ids
     * @return void
     */
    public function destroy($ids)
    {
        return (new JsonResource($this->page->destroy($ids)));
    }
}