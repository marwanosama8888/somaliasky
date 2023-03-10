<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    public $guarded=['id','created_at','updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
