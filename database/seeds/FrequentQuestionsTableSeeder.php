<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //agregado

class FrequentQuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Frequent_question::class, 15)->create();
    }
}
