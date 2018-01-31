<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'height',
        'width',
        'weight',
        'price',
        'discount',
        'star_rating',
        'status',
        'manufacturer'
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class)->as('colorProducts')->withTimestamps()->withPivot('id', 'number');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function colorProducts()
    {
        return $this->hasMany(ColorProduct::class);
    }
}
