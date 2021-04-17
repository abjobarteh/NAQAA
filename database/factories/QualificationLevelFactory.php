<?php

namespace Database\Factories;

use App\Models\QualificationLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

class QualificationLevelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QualificationLevel::class;

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
