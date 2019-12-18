<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //agregado

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
          'payment_methods',
          'user_categories',
          'users',
          'product_categories',
          'products'
        ]);

        $this->call(PaymentMethodsTableSeeder::class); //llamo a la clase seeder
        $this->call(UserCategoriesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }

    protected function truncateTables($tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); //desactivar el fk

        foreach ($tables as $table) {
          DB::table($table)->truncate(); //eliminar registros de la tabla, para luego generarlos de nuevo
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); //activar el fk
    }
}
