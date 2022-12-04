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
        $user1 = User::factory()->create([
            'password' => Hash::make('abc123'),
        ]);
        $user2 = User::factory()->create([
            'password' => Hash::make('abc123'),
        ]);

        $this->post('/login', [
            'email' => $user1->email,
            'password' => 'abc123'
        ]);
        $responseNewGame = $this
            ->actingAs($user1)
            ->postJson(route('start-new-game'), [
                'number' => '1'
            ]);
        $id = $responseNewGame['game'][0]['id']; // 12345
        $joinDetails = [
            'number' => '1',
            'poker_game_id' => $id
        ];
        $responseJoinGameUser1 = $this
            ->actingAs($user1)
            ->postJson(route('join-game'), $joinDetails);


        $this->post('/login', [
            'email' => $user2->email,
            'password' => 'abc123'
        ]);
        $responseJoinGameUser2 = $this
            ->actingAs($user2)
            ->postJson(route('join-game'), $joinDetails);

        $this->assertAuthenticated();
        $this->assertDatabaseCount('poker_games',1);
        $this->assertDatabaseCount('users_Connected_To_Poker_Games',2);
    }


}
