<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $fillable = [
        'user_id',
        'status_id',
        'invoice',
        'receipt',
        'courier',
        'service',
        'shipping',
        'total_price',
        'total_weight',
        'contact',
        'note',
        'proof',
        'due_at'
    ];

    public function status() {
        return $this->belongsTo('App\Models\Status');
    }
}
