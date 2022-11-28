<?php

namespace Database\Factories;

use App\Models\PokerGame;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PokerGame>
 */
class PokerGameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => rand(1,100000)
        ];
    }
}
