<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TranslationTest extends TestCase
{
    use RefreshDatabase;

    public function test_translation_creation()
    {
        $user = User::factory()->create();
        $token = $user->createToken('api-token')->plainTextToken;

        $response = $this->withHeader('Authorization', "Bearer $token")->postJson('/api/translations', [
            'key' => 'hello',
            'locale' => 'en',
            'content' => 'Hello World',
        ]);

        $response->assertStatus(201);
    }
}
