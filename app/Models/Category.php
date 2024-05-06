<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    const IMAGE_UPLOAD_PATH = 'uploads/category';
    protected $fillable = ['name', 'parent_id', 'is_active', 'description'];

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    
    public function images() {
        return $this->hasMany(CategoryImage::class);
    }
    
    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
