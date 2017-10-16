<?php

namespace Lunar\Store;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';

    public function user()
    {
    	return $this->belongsTo('Lunar\User');
    }
}
