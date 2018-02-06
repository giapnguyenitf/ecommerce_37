<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'color_product_id',
        'file_name',
    ];

    public function colorProduct()
    {
        return $this->belongsTo(ColorProduct::class);
    }
}
