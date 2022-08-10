<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function sizes()
    {
        return $this->hasMany(\App\Models\Size::class);
    }
}
