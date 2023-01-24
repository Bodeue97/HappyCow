<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'pickup_date',
        'transport_to',
        'transport_from',
        'delivered',
        'carrier_id',
    ];
}
