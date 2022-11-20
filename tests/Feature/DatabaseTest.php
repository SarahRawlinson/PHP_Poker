<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_post_model()
    {
        Post::factory()->create();

        $this->assertDatabaseCount('posts', 1);
    }

    public function test_the_post_model_6()
    {
        Post::factory()->count(6)->create();

        $this->assertDatabaseCount('posts', 6);
    }

    public function test_the_post_user_relationship()
    {
        $user = User::factory()
            ->has(Post::factory()->count(5))
//            ->hasPosts(5)
            ->create();
        $this->assertDatabaseCount('posts',5);
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('posts', ['user_id' => $user->id]);
    }

    public function test_the_authentication()
    {
        $user = User::factory()->create([
            'password' => Hash::make('abc123'),
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'abc123'
        ]);

        $this->assertAuthenticated();
    }
}
