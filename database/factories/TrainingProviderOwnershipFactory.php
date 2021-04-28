<?php

namespace Database\Factories;

use App\Models\TrainingProviderOwnership;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingProviderOwnershipFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TrainingProviderOwnership::class;

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
