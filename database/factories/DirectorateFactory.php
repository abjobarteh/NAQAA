<?php

namespace Database\Factories;

use App\Models\Directorate;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirectorateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Directorate::class;

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
