<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'city';
    protected $guarded = [];

    public function province() {
        return $this->belongsTo('App\Models\Province', 'province_id', 'province_id');
    }

    public function address() {
        return $this->hasMany('App\Models\Address', 'city_id');
    }
}
