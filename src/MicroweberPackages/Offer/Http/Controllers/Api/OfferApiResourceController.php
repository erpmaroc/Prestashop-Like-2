<?php

namespace depexorPackages\Offer\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use depexorPackages\Offer\Http\Requests\OfferCreateUpdateRequest;
use App\Http\Controllers\Controller;
use depexorPackages\Offer\Models\Offer;
use Illuminate\Http\Request;

class OfferApiResourceController extends Controller
{
    public function store(OfferCreateUpdateRequest $request)
    {
        $offer = Offer::add($request->all());

        $json = [];
        $json['offer_id'] = isset($offer->id) ? $offer->id : null;
        $json['success_edit'] = isset($offer->id);

        return (new JsonResource($json))->response();


    }


    public function destroy(Request $request)
    {
        $delete = Offer::deleteById($request->offer_id);

        if ($delete) {
            $res = ['status' => 'success'];
        } else {
            $res = ['status' => 'failed'];
        }
        return (new JsonResource($res))->response();


    }
}