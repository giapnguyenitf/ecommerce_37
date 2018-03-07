<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'payment_id',
        'status',
        'total_money'
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
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
