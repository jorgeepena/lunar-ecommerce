<?php

namespace Lunar\Store;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'product_reviews';
    protected $primaryKey = 'id';

    public function product()
    {
    	return $this->belongsTo('Lunar\Store\Product');
    }
}
