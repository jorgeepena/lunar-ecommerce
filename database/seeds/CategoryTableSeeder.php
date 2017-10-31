<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \Lunar\Store\Category([
        	'parent_id' => "0",
            'name' => "Aretes",
        	'slug' => "aretes",
        ]);

        $category->save();

        $category = new \Lunar\Store\Category([
        	'parent_id' => "1",
            'name' => "Cortos",
        	'slug' => "cortos",
        ]);

        $category->save();

        $category = new \Lunar\Store\Category([
        	'parent_id' => "1",
            'name' => "Largos",
        	'slug' => "largos",
        ]);

        $category->save();

        $category = new \Lunar\Store\Category([
        	'parent_id' => "0",
            'name' => "Collares",
        	'slug' => "collares",
        ]);

        $category->save();

        $category = new \Lunar\Store\Category([
        	'parent_id' => "0",
            'name' => "Blusas",
        	'slug' => "blusas",
        ]);

        $category->save();

        $category = new \Lunar\Store\Category([
        	'parent_id' => "5",
            'name' => "Manga Larga",
        	'slug' => "manga-larga",
        ]);

        $category->save();

        $category = new \Lunar\Store\Category([
        	'parent_id' => "5",
            'name' => "Manga Corta",
        	'slug' => "manga-corta",
        ]);

        $category->save();
    }
}
