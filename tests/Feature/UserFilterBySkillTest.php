<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Skill;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserFilterBySkillTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_filter_users_by_skill()
    {
        // Create skills
        $skill = Skill::factory()->create(['name' => 'Laravel']);
        $otherSkill = Skill::factory()->create(['name' => 'Vue.js']);
        
        // Create users and attach skills
        $userWithSkill = User::factory()->create();
        $userWithSkill->skills()->attach($skill->id);
        
        $userWithoutSkill = User::factory()->create();
        $userWithoutSkill->skills()->attach($otherSkill->id);
        
        // Make a GET request to the filterBySkill endpoint using the named route
        $response = $this->getJson(route('users.skill', ['skill' => 'Laravel']));
        
        // Assert that the response contains only the user with the specified skill
        $response->assertStatus(200)
                 ->assertJsonCount(1)  // We expect only one user to have the 'Laravel' skill
                 ->assertJsonFragment([
                     'id' => $userWithSkill->id,
                     'name' => $userWithSkill->name,
                 ])
                 ->assertJsonMissing([
                     'id' => $userWithoutSkill->id,
                 ]);
    }
}
