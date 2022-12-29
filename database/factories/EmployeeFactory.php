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
            'Tel' => "0423590121",
            'Sex' => $this->faker->randomElement(['M', 'F']),
            'BirthDate' => $this->faker->date(),
            'AcceptedDate' => $this->faker->date(),
            'Address' => substr($this->faker->streetAddress(), 0, 30),
            'Picture' => "https://picsum.photos/600/400/?random"
            //'Picture' => $this->faker->imageUrl(640, 480, 'people', true, 'Faker')
            // Omitting the picture
        ];
    }
}
