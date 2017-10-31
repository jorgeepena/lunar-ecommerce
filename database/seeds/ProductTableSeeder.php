<?php

use Store\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \Lunar\Store\Product([
        	'name' => "Xbox 360",
            'slug' => "xbox_360",
        	'description' => "The Xbox 360 is a home video game console developed by Microsoft. As the successor to the original Xbox, it is the second console in the Xbox series. It competed with Sony's PlayStation 3 and Nintendo's Wii as part of the seventh generation of video game consoles.",
        	'price' => 399,
        	'image' => 'product_test.png',
        ]);

        $product->save();

        $product = new \Lunar\Store\Product([
        	'name' => "Xbox One",
            'slug' => "xbox_one",
        	'description' => "Xbox One is a line of eighth generation home video game consoles developed by Microsoft. Announced in May 2013, it is the successor to Xbox 360 and the third console in the Xbox family.",
        	'price' => 699,
        	'image' => 'product_test2.png',
        ]);

        $product->save();

        $product = new \Lunar\Store\Product([
        	'name' => "Nintendo Switch",
            'slug' => "nintendo_switch",
        	'description' => "The Nintendo Switch[b] is the seventh major video game console developed by Nintendo. Known in development by its codename NX, it was unveiled in October 2016 and was released worldwide on March 3, 2017.[a] Nintendo considers the Switch a 'hybrid' console; it is designed primarily as a home console, with the main unit inserted onto a docking station to connect to a television.",
        	'price' => 999,
        	'image' => 'product_test2.png',
        ]);

        $product->save();

        $product = new \Lunar\Store\Product([
        	'name' => "PlayStation 4",
            'slug' => "playstation_4",
        	'description' => "PlayStation 4 (PS4) is a line of eighth generation home video game consoles developed by Sony Interactive Entertainment. Announced as the successor to the PlayStation 3 during a press conference on February 20, 2013, it was launched on November 15 in North America, November 29 in Europe, South America and Australia; and February 22, 2014, in Japan. It competes with Nintendo's Wii U and Switch, and Microsoft's Xbox One.",
        	'price' => 699,
        	'image' => 'product_test2.png',
        ]);

        $product->save();

        $product = new \Lunar\Store\Product([
            'name' => "Nintendo Wii",
            'slug' => "nintendo_wii",
            'description' => "Wii (ウィー Uī?) es una videoconsola producida por Nintendo y estrenada el 19 de noviembre de 2006 en Norteamérica y el 8 de diciembre del mismo año en Europa. Perteneciente a la séptima generación de consolas,10​ es la sucesora directa de Nintendo GameCube y compitió con la Xbox 360 de Microsoft y la PlayStation 3 de Sony. Nintendo afirmó que Wii está destinada a una audiencia más amplia a diferencia de las otras dos consolas.11​ Desde su debut, la consola superó a sus competidoras en cuanto a ventas,12​ y, en diciembre de 2009, rompió el récord como la consola más vendida en un solo mes en Estados Unidos.",
            'price' => 299,
            'image' => 'product_test.png',
        ]);

        $product->save();

        $product = new \Lunar\Store\Product([
            'name' => "Nintendo 3DS",
            'slug' => "nintendo_3ds",
            'description' => "Nintendo 3DS (ニンテンドー3DS Nintendō Surī Dī Esu?) es una videoconsola portátil de la multinacional de origen japonés, Nintendo, para videojuegos y multimedia, cuya atracción principal es poder mostrar gráficos en 3D sin necesidad de gafas especiales, gracias a la autoestereoscopia.10​ La consola es retrocompatible con la Nintendo DS y con el software de DSiWare.10​ Tras haberse anunciado en 2010, Nintendo lo presentó oficialmente en el E3 2010,10​11​ llevando consolas de prueba para los asistentes al evento.12​ La consola es la sucesora de la serie portátil Nintendo DS10​ y compite principalmente con su único rival, la PlayStation Vita de Sony.",
            'price' => 399,
            'image' => 'product_test.png',
        ]);

        $product->save();
    }
}
