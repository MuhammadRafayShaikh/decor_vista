<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'price', 'address','phone'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderitem()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

}