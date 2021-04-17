<?php

namespace Database\Factories;

use App\Models\EducationSubField;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationSubFieldFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EducationSubField::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->text(),
        ];
    }
}
