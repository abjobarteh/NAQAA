<?php

namespace Database\Factories;

use App\Models\TrainingProviderStaffsRank;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingProviderStaffsRankFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TrainingProviderStaffsRank::class;

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