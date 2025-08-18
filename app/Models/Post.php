<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory;

    protected $fillable = ['name','color','category_id','price'];

    public function category()  {
        return $this->belongsTo(Category::class);
    }

}