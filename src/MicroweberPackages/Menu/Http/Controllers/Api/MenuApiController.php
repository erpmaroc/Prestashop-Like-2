<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 8/19/2020
 * Time: 4:09 PM
 */
namespace depexorPackages\Menu\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use depexorPackages\App\Http\Controllers\AdminDefaultController;
use depexorPackages\Menu\Http\Requests\MenuApiRequest;
use depexorPackages\Menu\Repositories\MenuApiRepository;

class MenuApiController extends AdminDefaultController
{
    public $menu;

    public function __construct(MenuApiRepository $menu)
    {
        $this->menu = $menu;
    }

    /**
     * Display a listing of the product.\
     *
     * @param MenuRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (new JsonResource($this->menu->all()))->response();
    }

    /**
     * Store menu in database
     * @param MenuApiRequest $request
     * @return mixed
     */
    public function store(MenuApiRequest $request)
    {
        return (new JsonResource($this->menu->create($request->all())));
    }

    /**
     * Display the specified resource.show
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return (new JsonResource($this->menu->show($id)));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  MenuRequest $request
     * @param  string $id
     * @return Response
     */
    public function update(MenuApiRequest $request, $id)
    {
        return (new JsonResource($this->menu->update($request->all(), $id)));
    }

    /**
     * Destroy resources by given ids.
     *
     * @param string $ids
     * @return void
     */
    public function delete($id)
    {
        return (new JsonResource($this->menu->delete($id)));
    }

    /**
     * Delete resources by given ids.
     *
     * @param string $ids
     * @return void
     */
    public function destroy($ids)
    {
        return (new JsonResource($this->menu->destroy($ids)));
    }
}
