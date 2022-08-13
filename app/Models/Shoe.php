<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['brand', 'model', 'color', 'price', 'size_ids'];

    protected $casts = ['size_ids' => 'array',
    ];


}
