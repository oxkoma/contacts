<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PersoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Persone::factory(10)->create();
        
    }
}