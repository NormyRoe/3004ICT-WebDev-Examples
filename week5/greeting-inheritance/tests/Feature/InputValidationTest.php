<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputValidationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_missing_name_fails(): void
    {
        $response = $this->post('/greeting', ['age'=>4]);
        $response->assertSessionHasErrors('name');
    }

    public function test_name_too_short_fails(): void
    {
        $response = $this->post('/greeting', ['name'=>'A', 'age'=>4]);
        $response->assertSessionHasErrors('name');
    }

    public function test_name_too_long_fails(): void
    {
        $response = $this->post('/greeting', ['name'=>'012345678901234567890123456789012345678901234567890', 'age'=>4]);
        $response->assertSessionHasErrors('name');
    }
}
