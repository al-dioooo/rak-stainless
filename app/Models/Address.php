<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';
    protected $fillable = [
        'user_id',
        'postal_code',
        'address'
    ];

    public function user() {
        return $this->hasMany('App\Models\User');
    }

    public function city() {
        return $this->belongsTo('App\Models\City', 'city_id', 'city_id');
    }
}
