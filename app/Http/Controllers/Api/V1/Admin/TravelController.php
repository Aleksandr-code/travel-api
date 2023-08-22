<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TravelRequest;
use App\Http\Resources\TravelResource;
use App\Models\Travel;
use Illuminate\Http\Resources\Json\JsonResource;

class TravelController extends Controller
{
    public function store(TravelRequest $request): JsonResource
    {
        $data = $request->validated();

        $travel = Travel::create($data);

        return new TravelResource($travel);
    }

    public function update(Travel $travel, TravelRequest $request): JsonResource
    {
        $data = $request->validated();

        $travel->update($data);

        return new TravelResource($travel);
    }
}
