<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::factory('App\Models\User'),
            'task_name'=>$this->faker->text(10),
            'content'=>$this->faker->text(10),
            'start_date'=>$this->faker->datetimeThisMonth()->format('y-m-d'),
            'end_date'=>$this->faker->datetimeThisMonth()->format('y-m-d'),
            'status'=>$this->faker->randomElement(['1','2','3']),
            'priority'=>$this->faker->randomElement(['1','2','3','4']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
