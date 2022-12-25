<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dependent>
 */
class DependentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "ID" => ucfirst($this->faker->randomLetter()).$this->faker->randomDigit(9),
            "Name" => substr($this->faker->lastName(), 0, 14),
            "Employee_ID" => Employee::inRandomOrder()->first()->ID,
            "Relationship" => substr($this->faker->randomElement(["Father", "Mother", "Broth.", "Sister", "Son", "Daugh."]), 0, 14),
        ];
    }
}
