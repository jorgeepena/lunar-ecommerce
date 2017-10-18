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

    public static function getProductBySlug($slug)
    {
        $model = new static;
        return $model->where('slug', '=', $slug)->first();
    }
}
