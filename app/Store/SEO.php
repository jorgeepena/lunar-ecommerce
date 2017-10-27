<?php

namespace Lunar\Store;

use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    protected $table = 'page_seo';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'page_url',
    	'page_title',
    	'page_description',
    	'page_keywords',
    	'page_logo',
    	'page_google_robots',
    	'page_og_type',
    ];
}
