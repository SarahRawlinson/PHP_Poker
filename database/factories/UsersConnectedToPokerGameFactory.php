<?php

namespace Database\Factories;

use App\Models\UsersConnectedToPokerGame;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<UsersConnectedToPokerGame>
 */
class UsersConnectedToPokerGameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number' => rand(1,100000),
            'poker_game_id' => rand(1,100000)
        ];
    }
}
