<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(),
            'start_time' => Carbon::now(),
            'end_time' => Carbon::createFromFormat('Y-m-d H:i:s', now())->addHours(rand(2, 4)),
            'level' => rand(1, 5)
        ];
    }
}
