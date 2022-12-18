<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'company_id' => Company::inRandomOrder()->take(1)->first()->id,
            'email' => fake()->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber,
            'occupation' => fake()->name()
        ];
    }


}
