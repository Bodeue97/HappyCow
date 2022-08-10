<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;


    public $fillable = ['EU', 'UK', 'US_male', 'US_female'];
    public $timestamps = false;

    public function shoe()
    {
        return $this->belongsTo(\App\Models\Shoe::class);
    }
}
