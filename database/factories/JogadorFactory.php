<?php

namespace Database\Factories;

use App\Models\Jogador;
use Illuminate\Database\Eloquent\Factories\Factory;

class JogadorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jogador::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'habilidade' => $this->faker->numberBetween(1,5),
            'goleiro' => $this->faker->boolean()
        ];
    }
}
