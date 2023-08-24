<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelRequest;
use App\Http\Resources\TravelResource;
use App\Models\Travel;
use Illuminate\Http\Resources\Json\JsonResource;

class TravelController extends Controller
{
    /**
     * @OA\POST(
     *      path="/api/v1/admin/travels",
     *      operationId="storeTravel",
     *      tags={"Travel"},
     *      summary="Add a new travel",
     *      description="Add a new travel",
     *      security={
     *          { "bearerAuth": {} },
     *      },
     *      @OA\RequestBody(
     *          required = true,
     *          description = "Create a new travel",
     *          @OA\JsonContent(ref="#/components/schemas/TravelRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TravelResource")
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
     *          description="Unprocessable Content",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The name has already been taken."),
     *              @OA\Property(property="errors", type="object",
     *                  @OA\Property(
     *                      property="name",
     *                      type="array",
     *                      @OA\Items(type="string", example="The name has already been taken.")
     *                  )
     *              )
     *          )
     *      ),
     *  )
     */

    public function store(TravelRequest $request):JsonResource
    {
        $data = $request->validated();

        $travel = Travel::create($data);

        return new TravelResource($travel);
    }

    /**
     * @OA\PUT(
     *      path="/api/v1/admin/travels/{travel}",
     *      operationId="updateTravel",
     *      tags={"Travel"},
     *      summary="Update travel",
     *      description="Update travel",
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
     *          description = "Update this travel",
     *          @OA\JsonContent(ref="#/components/schemas/TravelRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/TravelResource")
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
     *          response=404,
     *          description="Resource Not Found"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Content",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The name has already been taken."),
     *              @OA\Property(property="errors", type="object",
     *                  @OA\Property(
     *                      property="name",
     *                      type="array",
     *                      @OA\Items(type="string", example="The name has already been taken.")
     *                  )
     *              )
     *          )
     *      ),
     *  )
     */

    public function update(Travel $travel, TravelRequest $request): JsonResource
    {
        $data = $request->validated();

        $travel->update($data);

        return new TravelResource($travel);
    }
}
