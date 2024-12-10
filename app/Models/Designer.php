<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designer extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'exp',
        'category_id',
        'portfolio',
        'phone',
        'image',
        'descript',
        'user_id',
        'available'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public $timestamps = false;
}
