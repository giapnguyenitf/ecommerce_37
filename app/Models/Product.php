<?php

namespace App\Models;

use Storage;
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
        'manufacturer',
        'thumbnail'
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

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getThumbnailPathAttribute()
    {
        return Storage::url(config('setting.thumbnails_path') . $this->thumbnail);
    }

    public function getLastPriceAttribute()
    {
        return $this->price - $this->price * $this->discount;
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function getDiscountPercentAttribute()
    {
        return $this->discount * 100;
    }
}
