<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //agregado

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
          'name_pm' => "Tarjeta",
          'state_pm' => 1
        ]);
    }
}
