<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TourRequest;
use App\Http\Resources\TourResource;
use App\Models\Travel;
use Illuminate\Http\Resources\Json\JsonResource;

class TourController extends Controller
{
    /**
     * @OA\POST(
     *      path="/api/v1/admin/travels/{travel}/tours",
     *      operationId="storeTour",
     *      tags={"Tour"},
     *      summary="Add a new tour",
     *      description="Add a new tour",
     *      security={
     *          { "bearerAuth": {} },
     *      },
     *      @OA\Parameter(
     *          name="travelID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required = true,
     *          description = "Create a new tour",
     *          @OA\JsonContent(ref="#/components/schemas/TourRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TourResource")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Content"
     *      )
     *  )
     */

    public function store(Travel $travel, TourRequest $request): JsonResource
    {
        $data = $request->validated();
        $tour = $travel->tours()->create($data);

        return new TourResource($tour);
    }
}
