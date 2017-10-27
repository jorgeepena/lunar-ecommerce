<?php

namespace Lunar\Store;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'name'
    ];

    public function product()
    {
    	return $this->hasMany('Lunar\Store\Product');
    }
}
