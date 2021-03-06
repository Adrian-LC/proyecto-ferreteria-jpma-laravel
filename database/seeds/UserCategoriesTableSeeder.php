<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //agregado

class UserCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_categories')->insert([
          'name_uc' => "Administrador Principal"
        ]);

        DB::table('user_categories')->insert([
          'name_uc' => "Administrador Secundario"
        ]);

        DB::table('user_categories')->insert([
          'name_uc' => "Cliente"
        ]);
    }
}
