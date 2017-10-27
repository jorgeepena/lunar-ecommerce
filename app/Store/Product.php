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
        return $this->belongsTo('Lunar\Store\Category');
    }


    public static function getProductById($id)
    {
        $model = new static;
        return $model->where('id', '=', $id)->first();
    }
}
