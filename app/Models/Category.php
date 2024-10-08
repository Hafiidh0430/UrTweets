<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'id_category';
    protected $fillable = ['category'];
    public $timestamps = true;

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_category', 'category_id', 'post_id');
    }
}
