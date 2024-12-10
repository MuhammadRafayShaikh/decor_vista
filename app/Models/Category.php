<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['c_name','c_image'];

    public function product()
    {
       return $this->hasMany(product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

   
}
