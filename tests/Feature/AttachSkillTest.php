<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;

class AttachSkillTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic functional test example.
     */
    public function test_interacting_with_headers(): void
    {
        $user = User::factory()->create(); // Use User::factory()->create() for recent Laravel versions
        $skill= Skill::factory()->create(); 

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->post('/users/1/skills'); // Removed trailing comma

        $response->assertStatus(201);
    }
}
