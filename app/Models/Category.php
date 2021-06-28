<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getAllSubCategoryProducts()
    {
        $childrenIds = $this->children()->pluck('id');
        return Product::query()->whereIn('category_id', $childrenIds)->orWhere('category_id',$this->id)->get();
    }
}
