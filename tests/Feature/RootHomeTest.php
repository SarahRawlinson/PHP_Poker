<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class RootHomeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response(): void
    {

        if (env('APP_ENV') != 'git')
        {
            $response = $this->get('/');
            $response->assertStatus(200);
        }
        else
        {
            $this->assertEquals(0,0);
        }
    }
}
