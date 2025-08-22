<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MainFeatureTest extends TestCase
{
    /**
     * Test to see home pages loads
     */
    public function test_homepage_loads(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_greeting_submission(): void
    {
        $response = $this->post('/greeting', ['name'=>'Bob', 'age'=>18]);
        $response->assertSee('Bob');
        $response->assertSee(19);
    }

    public function test_user_route(): void 
    {
        $response = $this->get('/user/Bob');
        $response->assertSee('Hello Bob');
    }
}
