<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserFilterByNameTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_filter_users_by_name()
    {
        
        // Create users and attach skills
        $userWithSkill = User::factory()->create(['name' => 'Belt']);
        
        // Make a GET request to the filterBySkill endpoint using the named route
        $response = $this->getJson(route('users.name', ['name' => 'Be']));
        
        // Assert that the response contains only the user with the specified skill
        $response->assertStatus(200)
                 ->assertJsonCount(1)  // We expect only one user to have the 'Laravel' skill
                 ->assertJsonFragment([
                     'id' => $userWithSkill->id,
                     'name' => $userWithSkill->name,
                 ]);
    }
}
