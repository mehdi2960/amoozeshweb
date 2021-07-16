<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedCategory extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $primaryKey = 'category_id';

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function getCategory ()
    {
       return FeaturedCategory::query()->first()->category;
    }
}
