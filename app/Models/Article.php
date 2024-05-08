<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
     protected $fillable = [
        'title',
        'full_text',
        'short_text',
        'category_id',
    ];

     public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
