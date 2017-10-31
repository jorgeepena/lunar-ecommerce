<?php

use Lunar\Store\SEO;
use Illuminate\Database\Seeder;

class PageSEOTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seo = new \Lunar\Store\SEO([
        	'page_url' => "yourdomain.com",
        	'page_title' => "Lunar E- Commerce",
        	'page_description' => "Lunar is an e-commerce solution developed with Laravel using Bootstrap 4.0 . The project main objective is to create a robust, multi-purpose and accesible e-commerce which, as a secondary objective, extends its functionality with the help of plugins that allows for flexible development.",
        	'page_keywords' => "Laravel, e-commerce, Lunar",
        	'page_google_robots' => "INFEX,FOLLOW,NOARCHIVE",
        	'page_og_type' => "website",
            'page_logo' => "logo.png",
        ]);

        $seo->save();
    }
}
