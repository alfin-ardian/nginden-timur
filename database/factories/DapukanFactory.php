<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DapukanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->word(),
            'keterangan' => $this->faker->sentence()
        ];
    }
}
