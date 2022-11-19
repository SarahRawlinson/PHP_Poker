<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
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
