<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Phone::factory(20)->has(\App\Models\Persone::factory())->create();
    }
}