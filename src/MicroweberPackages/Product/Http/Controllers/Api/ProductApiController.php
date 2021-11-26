<?php
/**
 * Created by PhpStorm.
 * User: Bojidar
 * Date: 8/19/2020
 * Time: 4:09 PM
 */

namespace depexorPackages\Product\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use depexorPackages\App\Http\Controllers\AdminDefaultController;
use depexorPackages\Product\Http\Requests\ProductRequest;
use depexorPackages\Product\Http\Requests\ProductCreateRequest;
use depexorPackages\Product\Http\Requests\ProductUpdateRequest;
use depexorPackages\Product\Repositories\ProductRepository;

class ProductApiController extends AdminDefaultController
{
    public $product;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;

    }

    /**
    /**
     * Display a listing of the product.
     *
     * @param ProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return (new JsonResource(
            $this->product
                ->filter($request->all())
                ->paginate($request->get('limit', 30))
                ->appends($request->except('page'))

        ))->response();

    }

    /**
     * Store product in database
     *
     * @param ProductCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductCreateRequest $request)
    {
        $result = $this->product->create($request->all());
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
        $result = $this->product->show($id);

        return (new JsonResource($result))->response();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProductRequest $request
     * @param  string $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductUpdateRequest $request, $product)
    {

        $result = $this->product->update($request->all(), $product);
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
        return $this->product->delete($id);
    }

    /**
     * Delete resources by given ids.
     *
     * @param string $ids
     * @return void
     */
    public function destroy($ids)
    {
        return $this->product->destroy($ids);
    }
}