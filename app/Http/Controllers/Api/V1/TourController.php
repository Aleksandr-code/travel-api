<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ToursListRequest;
use App\Http\Resources\TourResource;
use App\Models\Tour;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Validation\Rule;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Travel $travel, ToursListRequest $request):ResourceCollection
    {
        $tours = $travel->tours()
            ->when($request->priceFrom, function ($query) use($request){
                $query->where('price', '>=', $request->priceFrom * 100);
            })
            ->when($request->priceTo, function ($query) use ($request){
                $query->where('price', '<=', $request->priceTo * 100);
            })
            ->when($request->dateFrom, function ($query) use ($request){
                $query->where('starting_date', '>=', $request->dateFrom);
            })
            ->when($request->dateTo, function ($query) use ($request){
                $query->where('ending_date', '<=', $request->dateTo);
            })
            ->when($request->sortBy && $request->sortOrder, function ($query) use ($request){
                $query->orderBy($request->sortBy, $request->sortOrder);
            })
            ->orderBy('starting_date')
            ->paginate(15);

        return TourResource::collection($tours);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
