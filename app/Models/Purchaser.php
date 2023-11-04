<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchaser extends Model
{
    use HasFactory;

    /*
     * Note: all the $fillable elements should reflect their database column names counterpart  
     */
    protected $fillable = [
        'name',
        'type',
        'address',
        'city',
        'province',
        'zipcode',
        'country',
        'phone'
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
