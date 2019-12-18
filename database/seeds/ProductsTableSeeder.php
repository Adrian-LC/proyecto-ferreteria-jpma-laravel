<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //agregado

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Product::class, 50)->create();
        /*herramientas*/
        DB::table('products')->insert([
          'name_p' => "Amoladora Bosch Gws",
          'price_p' => 20000,
          'offer' => 0,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "herramienta1.png",
          'stock' => 20,
          'new' => 1,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 1
        ]);

        DB::table('products')->insert([
          'name_p' => "Máscara Fotosensible",
          'price_p' => 15000,
          'offer' => 5,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "herramienta2.jpg",
          'stock' => 25,
          'new' => 1,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 1
        ]);

        DB::table('products')->insert([
          'name_p' => "Juego De Llaves Allen",
          'price_p' => 5000,
          'offer' => 10,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "herramienta3.jpg",
          'stock' => 30,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 1
        ]);

        DB::table('products')->insert([
          'name_p' => "Llave Ajustable",
          'price_p' => 2000,
          'offer' => 15,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "herramienta4.jpg",
          'stock' => 20,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 1
        ]);

        DB::table('products')->insert([
          'name_p' => "Pinza Universal Irimo",
          'price_p' => 1000,
          'offer' => 18,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "herramienta5.jpg",
          'stock' => 20,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 1
        ]);

        DB::table('products')->insert([
          'name_p' => "Pinza Pico De Loro",
          'price_p' => 1500,
          'offer' => 0,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "herramienta6.jpg",
          'stock' => 14,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 1
        ]);

        DB::table('products')->insert([
          'name_p' => "Tenaza Carpintero",
          'price_p' => 3000,
          'offer' => 5,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "herramienta7.jpg",
          'stock' => 10,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 1
        ]);

        DB::table('products')->insert([
          'name_p' => "Taladro De Percusión",
          'price_p' => 30000,
          'offer' => 7,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "herramienta8.png",
          'stock' => 10,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 1
        ]);

        /*pinturas*/
        DB::table('products')->insert([
          'name_p' => "Casablanca Pro Latex Interior",
          'price_p' => 4000,
          'offer' => 7,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "pintura1.jpg",
          'stock' => 10,
          'new' => 1,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 2
        ]);

        DB::table('products')->insert([
          'name_p' => "Cielos Rasos Antihongo Blanco",
          'price_p' => 3000,
          'offer' => 0,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "pintura2.jpg",
          'stock' => 20,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 2
        ]);

        DB::table('products')->insert([
          'name_p' => "Sikaguard Ladrillos Transparente",
          'price_p' => 5000,
          'offer' => 10,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "pintura3.jpg",
          'stock' => 15,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 2
        ]);

        DB::table('products')->insert([
          'name_p' => "Pintura Sikaguard Frentes",
          'price_p' => 4020,
          'offer' => 0,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "pintura4.jpg",
          'stock' => 20,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 2
        ]);

        DB::table('products')->insert([
          'name_p' => "Duration Latex Para Cielorraso",
          'price_p' => 4100,
          'offer' => 0,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "pintura5.jpg",
          'stock' => 15,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 2
        ]);

        DB::table('products')->insert([
          'name_p' => "Sikalastic Frentes Impermeabilizante",
          'price_p' => 3200,
          'offer' => 5,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "pintura6.jpg",
          'stock' => 15,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 2
        ]);

        DB::table('products')->insert([
          'name_p' => "Casablanca Ultramaster Latex Interior Mate Blanco",
          'price_p' => 4300,
          'offer' => 0,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "pintura7.jpg",
          'stock' => 10,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 2
        ]);

        DB::table('products')->insert([
          'name_p' => "Prinz Latex Acrilico Int-Ext Mate Blanco",
          'price_p' => 3500,
          'offer' => 0,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "pintura8.jpg",
          'stock' => 10,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 2
        ]);

        /*terminaciones*/
        DB::table('products')->insert([
          'name_p' => "Grifería Fv Arizona 423/B1",
          'price_p' => 3000,
          'offer' => 5,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "terminacion1.jpg",
          'stock' => 10,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 3
        ]);

        DB::table('products')->insert([
          'name_p' => "Grifería Fv Libby 406/39",
          'price_p' => 3100,
          'offer' => 0,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "terminacion2.jpg",
          'stock' => 15,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 3
        ]);

        DB::table('products')->insert([
          'name_p' => "Grifería Fv Libby 411/39",
          'price_p' => 2700,
          'offer' => 0,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "terminacion3.jpg",
          'stock' => 12,
          'new' => 1,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 3
        ]);

        DB::table('products')->insert([
          'name_p' => "Pileta De Cocina Johnson Luxor SI85 Satinada",
          'price_p' => 2500,
          'offer' => 0,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "terminacion4.jpg",
          'stock' => 11,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 3
        ]);

        DB::table('products')->insert([
          'name_p' => "Pileta De Cocina Johnson C37/18",
          'price_p' => 2500,
          'offer' => 0,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "terminacion5.jpg",
          'stock' => 14,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 3
        ]);

        DB::table('products')->insert([
          'name_p' => "Bacha De Cocina Johnson Luxor SI85 Sta + Secaplatos Caselu",
          'price_p' => 3500,
          'offer' => 0,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "terminacion6.jpg",
          'stock' => 20,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 3
        ]);

        DB::table('products')->insert([
          'name_p' => "Pileta De Cocina Johnson SI71 Brillante",
          'price_p' => 3150,
          'offer' => 10,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "terminacion7.jpg",
          'stock' => 17,
          'new' => 1,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 3
        ]);

        DB::table('products')->insert([
          'name_p' => "Pileta De Cocina Johnson O37A 37X20",
          'price_p' => 2780,
          'offer' => 15,
          'detail' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
          'poster' => "terminacion8.jpg",
          'stock' => 15,
          'new' => 0,
          'state_p' => 1,
          'total_purchased' => 0,
          'product_category_id' => 3
        ]);
    }
}
