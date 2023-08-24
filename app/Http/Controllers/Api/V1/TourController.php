<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToursListRequest;
use App\Http\Resources\TourResource;
use App\Models\Travel;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TourController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/travels/{travelSlug}/tours",
     *      operationId="getListTours",
     *      tags={"Tour"},
     *      summary="Get paginate list of tours",
     *      description="Returns list of tours",
     *      @OA\Parameter(
     *          name="travelSlug",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="priceFrom",
     *          in="query",
     *          required=false,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="priceTo",
     *          in="query",
     *          required=false,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="dateFrom",
     *          in="query",
     *          required=false,
     *          @OA\Schema(
     *              type="string",
     *              format="date"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="dateTo",
     *          in="query",
     *          required=false,
     *          @OA\Schema(
     *              type="string",
     *              format="date"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="sortBy",
     *          in="query",
     *          required=false,
     *          @OA\Schema(
     *              type="string",
     *              default="price"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="sortOrder",
     *          in="query",
     *          required=false,
     *          @OA\Schema(
     *              type="string",
     *              example="asc"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/TourResource",
     *              example={
     *                  "data": {
     *                      {
     *                        "id": "99eb9c87-79ab-491d-9bb7-a29e77e14e79",
     *                        "name": "Magnam totam illum.",
     *                        "starting_date": "2023-08-18",
     *                        "ending_date": "2023-08-23",
     *                        "price": 154.6
     *                      },
     *                      {
     *                        "id": "2",
     *                        "name": "Magnam totam illum.",
     *                        "starting_date": "2023-08-18",
     *                        "ending_date": "2023-08-23",
     *                        "price": 154.6
     *                      },
     *                  },
     *                  "links": {
     *                      "first": "/api/v1/travels/facilis-fugit-iusto/tours?page=1",
     *                      "last": "/api/v1/travels/facilis-fugit-iusto/tours?page=1",
     *                      "prev": null,
     *                      "next": null
     *                  },
     *                  "meta": {
     *                      "current_page": 1,
     *                      "from": 1,
     *                      "last_page": 1,
     *                      "links": {
     *                          {
     *                              "url": null,
     *                              "label": "&laquo; Previous",
     *                              "active": false
     *                          },
     *                          {
     *                              "url": "/api/v1/travels/facilis-fugit-iusto/tours?page=1",
     *                              "label": "1",
     *                              "active": true
     *                          },
     *                          {
     *                              "url": null,
     *                              "label": "Next &raquo;",
     *                              "active": false
     *                          }
     *                      },
     *                      "path": "/api/v1/travels/facilis-fugit-iusto/tours",
     *                      "per_page": 15,
     *                      "to": 4,
     *                      "total": 4
     *                  },
     *              }
     *          ),
     *       )
     *     )
     */

    public function index(Travel $travel, ToursListRequest $request): ResourceCollection
    {
        $tours = $travel->tours()
            ->when($request->priceFrom, function ($query) use ($request) {
                $query->where('price', '>=', $request->priceFrom * 100);
            })
            ->when($request->priceTo, function ($query) use ($request) {
                $query->where('price', '<=', $request->priceTo * 100);
            })
            ->when($request->dateFrom, function ($query) use ($request) {
                $query->where('starting_date', '>=', $request->dateFrom);
            })
            ->when($request->dateTo, function ($query) use ($request) {
                $query->where('ending_date', '<=', $request->dateTo);
            })
            ->when($request->sortBy && $request->sortOrder, function ($query) use ($request) {
                $query->orderBy($request->sortBy, $request->sortOrder);
            })
            ->orderBy('starting_date')
            ->paginate(15);

        return TourResource::collection($tours);
    }
}
