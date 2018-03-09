<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'color_id',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getTotalMoneyAttribute()
    {
        return $this->product->last_price * $this->quantity;
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function getStatusDetailAttribute()
    {
        switch ($this->status) {
            case config('setting.waiting_for_process'):
                return trans('label.waiting_for_process');
            case config('setting.delivering'):
                return trans('label.delivering');
            case config('setting.done'):
                return trans('label.done');
            case config('setting.cancel'):
                return trans('label.cancel');
            default:
                return trans('label.waiting_for_process');
        }
    }
}
