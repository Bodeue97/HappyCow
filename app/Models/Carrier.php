<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'address',
        'name',
        'last_name',
        'vehicle',
    ];
}
