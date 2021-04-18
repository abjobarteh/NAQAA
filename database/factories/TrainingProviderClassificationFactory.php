<?php

namespace Database\Factories;

use App\Models\TrainingProviderClassification;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingProviderClassificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TrainingProviderClassification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}
