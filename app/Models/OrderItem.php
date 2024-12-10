<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table =  'orders_items';
    protected $fillable = ['order_id',  'product_id','quantity'] ;
    public function products()
     {
        return $this->belongsTo(Product::class,'product_id');
     }
    
// OrderItem.php
public function order()
{
    return $this->belongsTo(Order::class, 'order_id');
}
}
