<?php

namespace Lunar\Store;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'name',
    	'description',
    	'price',
    	'image',
    	'stock',
    ];

    public function category()
    {
        return $this->belongsToMany('Lunar\Store\Category', 'product_category', 'product_id', 'category_id');
    }

    public function reviews()
    {
        return $this->hasMany('Lunar\Store\Review', 'product_id');
    }

    public static function getProductById($id)
    {
        $model = new static;
        return $model->where('id', '=', $id)->first();
    }


}
