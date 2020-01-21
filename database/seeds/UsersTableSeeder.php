<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //agregado

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'first_name' => "Administrador Principal",
          'last_name' => "",
          'email' => "admin.principal@gmail.com",
          'password' => Hash::make("1234567890"),
          'state_u' => 1,
          'user_category_id' => 1
        ]);

        //uso factories para admin secundarios y clientes
        factory(App\User::class, 15)->create();
    }
}
