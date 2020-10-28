<?php

namespace Database\Factories;

use App\Models\Synonyms;
use Illuminate\Database\Eloquent\Factories\Factory;

class SynonymsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Synonyms::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'synonyms' => $this->faker->unique()->word,
            'word_id' => $this->faker->unique()->numberBetween(1,40),
        ];
    }
}
