<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Order extends Model
{
    protected $keyType = 'string';
    
    protected static function booted()
    {
        static::creating(function($order){
            $order->id = substr((string) Uuid::uuid4(), 0, 8);
        });
    }
}
