<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
* @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
*/

class UserFactory extends Factory {
    /**
    * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                 'first_name'=>fake()->name(),
                'last_name'=>fake()->name(),
                'email'=> fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'phone_number'=>fake()->phoneNumber,
                'address'=>fake()->address,
                'remember_token' => Str::random(10),
                'profile_picture'=>fake()->imageUrl('60','60'),
                'role_id'=>fake()->randomElement([1,2,3]),
                'status'=>fake()->randomElement(['active','inactive']),
                'gender'=>fake()->randomElement(['male','female']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
    */

    public function unverified(): static {
        return $this->state( fn ( array $attributes ) => [
            'email_verified_at' => null,
        ] );
    }
}
