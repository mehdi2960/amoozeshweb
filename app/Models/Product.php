<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = "products";

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }


    public function addGallery(Request $request)
    {
        $path = $request->file('file')->storeAs(
            'public/productGallery', $request->file('file')->getClientOriginalName(),
        );

        $this->galleries()->create([
            'product_id' => $this->id,
            'path' => $path,
            'mime' => $request->file('file')->getClientMimeType(),
        ]);
    }

    public function addDiscount(Request $request)
    {
        if (!$this->discount()->exists()) {
            $this->discount()->create([
                'product_id' => $this->id,
                'value' => $request->get('value'),
            ]);
        } else {
            $this->discount->update([
                'product_id' => $this->id,
                'value' => $request->get('value'),
            ]);
        }
    }

    public function updateDiscount(Request $request)
    {
        $this->discount->update([
            'product_id' => $this->id,
            'value' => $request->get('value')
        ]);
    }

    public function deleteDiscount(Discount $discount)
    {
        $discount->delete();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function discount()
    {
        return $this->hasOne(Discount::class);
    }

    public function priceWithDiscount()
    {
        if (!$this->discount()->exists()) {
            return $this->price;
        }

        return $this->price - $this->price * $this->discount->value / 100;
    }
}
