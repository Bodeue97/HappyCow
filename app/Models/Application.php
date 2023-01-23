<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'cattle',
        'application_date',
        'price',
        'verified',
        'reserved',
        'paid_for',
        'reserved_by',


    ];

    protected $casts = [
        'application_date' => 'datetime:YYYY-MM-DD'

    ];
}
