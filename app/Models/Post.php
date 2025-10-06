<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title','category_id','content','status'];
    public function user()
{
    return $this->belongsTo(User::class);
}

public function category()
{
    return $this->belongsTo(Category::class);
}

    use HasFactory;
}
