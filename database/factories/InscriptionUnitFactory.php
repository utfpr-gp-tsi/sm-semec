<?php

namespace Database\Factories;

use App\Models\InscriptionUnit;
use App\Models\Inscription;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class InscriptionUnitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InscriptionUnit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'unit_id' => Unit::factory(),
            'inscription_id' => Inscription::factory(),
        ];
    }
}
