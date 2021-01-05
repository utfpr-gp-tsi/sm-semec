<?php

namespace Database\Factories;

use App\Models\Workload;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkloadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Workload::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hours'  => $this->faker->randomElement(['20', '40']),
        ];
    }
}
