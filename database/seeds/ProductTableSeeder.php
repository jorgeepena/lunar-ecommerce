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
        	'description' => "The Xbox 360 is a home video game console developed by Microsoft. As the successor to the original Xbox, it is the second console in the Xbox series. It competed with Sony's PlayStation 3 and Nintendo's Wii as part of the seventh generation of video game consoles.",
        	'price' => 399,
        	'image' => "https://upload.wikimedia.org/wikipedia/commons/1/17/Xbox_360_S.png",
        ]);

        $product->save();

        $product = new \Lunar\Store\Product([
        	'name' => "Xbox One",
        	'description' => "Xbox One is a line of eighth generation home video game consoles developed by Microsoft. Announced in May 2013, it is the successor to Xbox 360 and the third console in the Xbox family.",
        	'price' => 699,
        	'image' => "https://upload.wikimedia.org/wikipedia/commons/thumb/2/2b/Microsoft-Xbox-One-Console-wKinect.png/1280px-Microsoft-Xbox-One-Console-wKinect.png",
        ]);

        $product->save();

        $product = new \Lunar\Store\Product([
        	'name' => "Nintendo Switch",
        	'description' => "The Nintendo Switch[b] is the seventh major video game console developed by Nintendo. Known in development by its codename NX, it was unveiled in October 2016 and was released worldwide on March 3, 2017.[a] Nintendo considers the Switch a 'hybrid' console; it is designed primarily as a home console, with the main unit inserted onto a docking station to connect to a television.",
        	'price' => 999,
        	'image' => "http://vignette4.wikia.nocookie.net/fireemblem/images/4/42/Nintendo_Switch.png/revision/latest?cb=20170115150103",
        ]);

        $product->save();

        $product = new \Lunar\Store\Product([
        	'name' => "PlayStation 4",
        	'description' => "PlayStation 4 (PS4) is a line of eighth generation home video game consoles developed by Sony Interactive Entertainment. Announced as the successor to the PlayStation 3 during a press conference on February 20, 2013, it was launched on November 15 in North America, November 29 in Europe, South America and Australia; and February 22, 2014, in Japan. It competes with Nintendo's Wii U and Switch, and Microsoft's Xbox One.",
        	'price' => 699,
        	'image' => "http://vignette1.wikia.nocookie.net/es.gta/images/b/bd/PS4.png/revision/latest?cb=20140610043606",
        ]);

        $product->save();
    }
}
