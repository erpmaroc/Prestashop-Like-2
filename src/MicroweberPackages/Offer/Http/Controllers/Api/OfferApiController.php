<?php

namespace depexorPackages\Offer\Http\Controllers\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use depexorPackages\Offer\Http\Requests\OfferCreateUpdateRequest;
use App\Http\Controllers\Controller;
use depexorPackages\Offer\Models\Offer;
use Illuminate\Http\Request;

class OfferApiController extends Controller
{


    public function index()
    {
        $offers = Offer::getAll();

        return $offers;
    }

    public function getByProductId($productId)
    {
        $offers = Offer::getByProductId($productId);

        return $offers;
    }


}