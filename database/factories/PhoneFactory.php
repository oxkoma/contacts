<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Persone;

class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'persone_id' => Persone::all()->random()->id,
            'phone' =>$this->faker->unique()->e164PhoneNumber()
        ];
    }
}