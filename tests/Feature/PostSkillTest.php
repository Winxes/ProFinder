<?php
 
namespace Tests\Feature;
 
use Tests\TestCase;
 
class PostSkillTest extends TestCase
{
    /**
     * A basic functional test example.
     */
    public function test_interacting_with_headers(): void
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/skills', ['name' => 'vapovapo']);
 
        $response->assertStatus(201);
    }
}