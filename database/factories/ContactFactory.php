<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $latestUser = User::latest()->first()->id;

        return [

            'name' => fake()->name(),
            'user_id' => rand(1, $latestUser),
            "country_code" => '95',

            'phone_number' => fake()->phoneNumber()
        ];
    }
}
