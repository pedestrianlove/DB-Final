<?php

namespace Database\Factories;

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

    protected $primaryKey = 'ID';

    public function definition()
    {
        return [
            'ID' => ucfirst($this->faker->randomLetter() . $this->faker->unique()->randomNumber(9)),
            'Name' => $this->faker->lastName(),
            'Rank' => $this->faker->randomElement(['Private', 'Corporal', 'Sergeant', 'Lieutenant', 'Captain', 'Major', 'Colonel']),
            'Salary' => $this->faker->randomNumber(5),
            'Tel' => "04-23590121",
            'Sex' => $this->faker->randomElement(['M', 'F']),
            'BirthDate' => $this->faker->date(),
            'AcceptedDate' => $this->faker->date(),
            'Address' => substr($this->faker->streetAddress(), 0, 30),
            'Picture' => "test.jpg"
            //'Picture' => $this->faker->imageUrl(640, 480, 'people', true, 'Faker')
            // Omitting the picture
        ];
    }
}
