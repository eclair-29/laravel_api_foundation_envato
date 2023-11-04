<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Invoice;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\InvoiceResource;
use App\Http\Requests\v1\StoreInvoiceRequest;
use App\Http\Requests\v1\UpdateInvoiceRequest;

class InvoiceController extends Controller
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
        return InvoiceResource::collection(Invoice::paginate());
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
    public function store(StoreInvoiceRequest $request)
    {
        //
    }

    public function bulkStore(StoreInvoiceRequest $request)
    {
        $bulk = collect($request->all())->map(function ($array, $key) {
            return Arr::except($array, ['purchaserId', 'billedDate', 'paidDate']);
        });

        Invoice::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return InvoiceResource::make($invoice);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceRequest $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
