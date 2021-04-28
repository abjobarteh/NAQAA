<?php

namespace Database\Factories;

use App\Models\Qualification;
use Illuminate\Database\Eloquent\Factories\Factory;

class QualificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Qualification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'tuition_fee' => $this->faker->numberBetween($min = 6000, $max = 9000),
            'duration' => $this->faker->numberBetween($min = 1, $max = 12),
            'entry_requirements' => $this->faker->words(5),
            'description' => $this->faker->realText(),
        ];
    }
}
