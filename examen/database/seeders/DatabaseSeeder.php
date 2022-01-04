<?php

namespace Database\Seeders;
use App\Models\resevering;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         resevering::factory(10)->create();
    }
}
