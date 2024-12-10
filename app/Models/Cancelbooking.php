<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancelbooking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function designer()
    {
        return $this->belongsTo(Designer::class);
    }

    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
