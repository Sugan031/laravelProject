<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegisterModel>
 */
class RegisterModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departments =['CSE','EEE','ECE','MECH'];
        return [
            'name' => fake()->name(),
            'email'=>fake()->unique()->safeEmail(),
            'mobile'=>fake()->unique()->phoneNumber(),
            'year'=>fake()->numberBetween(1,5),
            'department'=>fake()->randomElement($departments),
        ];
    }
}
