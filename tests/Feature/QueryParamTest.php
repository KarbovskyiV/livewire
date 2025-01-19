<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class QueryParamTest extends TestCase
{
    use RefreshDatabase;

    public function test_displays_todos(): void
    {
        Post::factory()->create(['title' => 'super secret post']);
        Post::factory()->create(['title' => 'super post']);

        Livewire::withQueryParams(['search' => 'secret'])
            ->test(ShowPosts::class)
            ->assertSee('super secret post')
            ->assertDontSee('super post');
    }
}
