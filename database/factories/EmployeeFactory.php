<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nric4Digit' => $this->faker->numerify('####'),
            'name' => $this->faker->name,
            'manpowerId' => $this->faker->unique()->word,
            'designation' => $this->faker->jobTitle,
            'project' => $this->faker->sentence,
            'team' => $this->faker->word,
            'supervisor' => $this->faker->name,
            'joinDate' => $this->faker->date,
            'resignDate' => $this->faker->optional()->date,
        ];
    }
}
