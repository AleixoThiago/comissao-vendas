<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $firstName = fake()->firstName();
        $password = Str::random(16);
        $name = $firstName.' '.fake()->lastName();

        return [
            'name' => $name,
            'email' => Str::slug($name, '.').'@'.fake()->freeEmailDomain(),
            'email_verified_at' => now(),
            'password' => bcrypt($password),
            'remember_token' => $password
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
