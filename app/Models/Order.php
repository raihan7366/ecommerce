<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function Stock()
    {
        return $this->hasMany(Stock::class);
    }
    public function details()
    {
        return $this->hasMany(OrderDetails::class,'order_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customers::class,'customer_id');
    }
}
