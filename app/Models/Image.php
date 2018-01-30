<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'product_id',
        'file_name',
    ];
    
    public function color_product()
    {
        return $this->belongsTo(Product::class);
    }
}
