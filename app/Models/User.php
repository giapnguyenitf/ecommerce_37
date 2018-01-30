<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'provider',
        'provider_id',
        'is_admin',
        'phone',
        'address',
        'village_or_ward',
        'district_or_town',
        'province_or_city',
        'date_of_birth',
        'gender',
        'avatar',
        'is_ban',
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
