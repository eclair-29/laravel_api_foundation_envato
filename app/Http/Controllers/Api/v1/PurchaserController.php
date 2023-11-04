<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Purchaser;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\StorePurchaserRequest;
use App\Http\Requests\v1\UpdatePurchaserRequest;
use App\Http\Resources\v1\PurchaserResource;

class PurchaserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /* 
         * Skipped...
         * 00:35:48 3.3 Filtering Data 
         * 00:49:47 3.4 Filtering More Data 
         * 00:58:49 3.5 Including Related Data 
         * 
         * Video URL:
         * https://www.youtube.com/watch?v=YGqCZjdgJJk&t=2460s&ab_channel=EnvatoTuts%2B
         */
        return PurchaserResource::collection(Purchaser::latest()->paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePurchaserRequest $request)
    {
        return PurchaserResource::make(Purchaser::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchaser $purchaser)
    {
        return PurchaserResource::make($purchaser);;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchaser $purchaser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaserRequest $request, Purchaser $purchaser)
    {
        $isUpdated = $purchaser->update($request->all());

        return $isUpdated == 1 ? response([
            'response' => 'Successfully updated purchaser with id of ' . $purchaser->id
        ]) : response([
            'response' => 'Unable to update data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchaser $purchaser)
    {
        //
    }
}
