<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'purchaserId' => $this->purchaser_id,
            'status' => $this->status,
            'amount' => $this->amount,
            'billedDate' => $this->billed_date,
            'paidDate' => $this->paid_date
        ];
    }
}
