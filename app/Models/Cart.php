<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ['user_id', 'shoe_size_ids', 'total_price'];

    protected $casts = ['shoe_size_ids', 'array',
        ];
}
