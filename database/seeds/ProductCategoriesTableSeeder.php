<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //agregado

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Product_category::class, 5)->create();
        DB::table('product_categories')->insert([
          'name_pc' => "Herramientas",
          'state_pc' => 1
        ]);

        DB::table('product_categories')->insert([
          'name_pc' => "Pinturas",
          'state_pc' => 1
        ]);

        DB::table('product_categories')->insert([
          'name_pc' => "Terminaciones",
          'state_pc' => 1
        ]);
    }
}
