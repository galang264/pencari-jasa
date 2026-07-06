<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Review;
use App\Models\Category;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','mitra_id','title','description','price','service_photo'];

    public function mitra()
    {
        return $this->belongsTo(User::class, 'mitra_id');
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class);
    }

    public function favorites()
    {
        return $this->hasMany(\App\Models\Favorite::class);
    }
}