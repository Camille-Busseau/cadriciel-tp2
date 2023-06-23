<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'email'=>$this->faker->email(),
            'address'=>$this->faker->streetAddress(),
            'phone'=>$this->faker->phoneNumber(),
            'bday'=>$this->faker->date(),
            'city_id'=>City::all()->random()->id
        ];
    }
}
