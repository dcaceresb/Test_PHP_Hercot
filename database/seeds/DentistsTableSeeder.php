<?php

use Illuminate\Database\Seeder;
use App\Dentist;
class DentistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Dentist::class, 10)->create();
    }
}
