<?php

use Illuminate\Database\Seeder;

class autorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\autor::class, 2)->create();
    }
}
