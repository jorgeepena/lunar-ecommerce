<?php

namespace Lunar;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{	
	protected $table = 'user_wishlists';
    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'product_id'];

    public function product()
    {
        return $this->belongsTo('Lunar\Store\Product');
    }
}
