<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model

{
    protected $fillable=['title','description','slug','subtitle','category_id','image','price','sponsor'];
    public function getPrice()
    {
        $price = $this->price / 100;

        return number_format($price, 2, ',', ' ') . ' €';
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
