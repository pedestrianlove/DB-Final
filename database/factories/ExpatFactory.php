<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Nation;
use App\Models\Employee;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expat>
 */
class ExpatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "Nation_Code" => Nation::inRandomOrder()->first()->Code,
            "Employee_ID" => Employee::inRandomOrder()->first()->ID,
            "Ambassador_Name" => substr ($this->faker->name(),0, 14),
            "StartDate" => $this->faker->date()
        ];
    }
}
