<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TravelResource;
use App\Models\Travel;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TravelController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/travels",
     *      operationId="getPublicTravels",
     *      tags={"Travel"},
     *      summary="Get list of public travels",
     *      description="Returns list of travels",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TravelResource")
     *       )
     *     )
     */

    public function index(): ResourceCollection
    {
        $travels = Travel::where('is_public', true)->paginate(15);

        return TravelResource::collection($travels);
    }
}
