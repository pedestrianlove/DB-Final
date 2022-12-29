<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nation>
 */
class NationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $primaryKey = 'Code';
    public function definition()
    {
        return [
            "Code" => $this->faker->unique()->countryCode
                        .$this->faker->randomDigit(4),
            "Name" => substr($this->faker->country(14), 0, 13),
            "Continent" => $this->faker->randomElement(['Asia', 'Europe', 'Ameri.', 'Africa', 'Antar.']),
            "Leader" => substr($this->faker->lastName(), 0, 13),
            "FMinister" => substr ($this->faker->lastName(), 0, 13),
            "Contacts" => substr ($this->faker->lastName(), 0, 13),
            "Population" => $this->faker->randomDigit(14),
            "Area" => $this->faker->randomDigit(14),
            "Tel" => "0423590121",
            "IsFriend" => $this->faker->randomElement(['yes', 'no'])
        ];
    }
}
