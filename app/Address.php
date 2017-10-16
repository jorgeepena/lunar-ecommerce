<?php

namespace Lunar;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'user_addresses';
    protected $primaryKey = 'id';

    public function user()
    {
    	return $this->belongsTo('Lunar\User');
    }
}
