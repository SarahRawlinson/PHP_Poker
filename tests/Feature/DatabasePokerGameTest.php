<?php

namespace Tests\Feature;

use App\Models\PokerGame;
use App\Models\User;
use App\Models\UsersConnectedToPokerGame;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class DatabasePokerGameTest extends TestCase
{
    use RefreshDatabase;


    public function test_the_poker_game_user_relationship()
    {
        $user = User::factory()
            ->has(PokerGame::factory())
            ->create();
        $this->assertDatabaseCount('poker_games',1);
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('poker_games', ['user_id' => $user->id]);
    }

    public function test_the_poker_game_user_relationship2()
    {

        $gameOwnerUser = User::factory()
            ->has(PokerGame::factory())
            ->create();
        $game = $gameOwnerUser->pokerGame()->get()[0];
        $this->assertDatabaseCount('poker_games',1);
        $this->assertEquals(1,$game->id);
        $this->assertEquals(1,$game->user_id);
    }
    public function test_the_post_user_relationship()
    {

//        $gameOwnerUser = User::factory()
//            ->has(PokerGame::factory())
//            ->create();
//        $game = $gameOwnerUser->pokerGame()->get()[0];
//        $arr = ['poker_game_id' => $game->id];
        $gameJoiner1 = User::factory()
            ->has(UsersConnectedToPokerGame::factory())
            ->create();

        $this->assertDatabaseCount('users_Connected_To_Poker_Games',1);
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('users_Connected_To_Poker_Games', ['user_id' => $gameJoiner1->id]);
    }

    public function test_requests()
    {
        $user = User::factory()->create([
            'password' => Hash::make('abc123'),
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'abc123'
        ]);
        $responseNewGame = $this
            ->actingAs($user)
            ->postJson(route('start-new-game'), [
                'number' => '1'
            ]);
        $responseJoinGame = $this
            ->actingAs($user)
            ->postJson(route('join-game'), [
                'number' => '1',
                'poker_game_id' => '1'
            ]);

        $this->assertAuthenticated();
        $this->assertDatabaseCount('poker_games',1);
    }


}
