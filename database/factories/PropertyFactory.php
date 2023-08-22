<?php

namespace Database\Factories;

use App\Models\Amenity;
use App\Models\City;
use App\Models\Country;
use App\Models\PTypes;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
* @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
*/

class PropertyFactory extends Factory {
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
            'ptype_id' => PTypes::all()->random()->first->id,
            'amenities_id' => Amenity::all()->random()->first->id,
            'property_name' => fake()->name(),
            'slug' => strtolower( str_replace( ' ', '-', $this->property_name ) ),
            'property_code' => fake()->numerify(),
            'property_status' =>"active",
            'Additional_fees'=>rand(1,50),
            'price' => rand(50,1000),
            'description' => fake()->text(200),
            'property_size' => rand(1,3),
            'address' => fake()->address(),
            'city' => City::all()->random()->first()->id,
            'state' => State::all()->random()->first()->id,
            'country'=>Country::all()->random()->first()->id,
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'featured' => 1,
            'hot' => 1,
            'user_id' => User::all()->random()->first()->id,
            'property_thumbnail' => fake()->image('image'),
            'created_at' => Carbon::now(),
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
