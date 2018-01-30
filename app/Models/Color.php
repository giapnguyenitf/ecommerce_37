<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        'name',
    ];

    public function color_products()
    {
        return $this->hasMany(ColorProduct::class);
    }
}
