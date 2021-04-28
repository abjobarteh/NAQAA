<?php

namespace Database\Factories;

use App\Models\LocalGovermentAreas;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocalGovermentAreasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LocalGovermentAreas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city(),
            'region_id' => Region::factory()->create(),
        ];
    }
}
