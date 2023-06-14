<?php

namespace Tests\Unit;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Posts unit test.
     *
     * @return void
     */

    public function test_create_data()
    {

        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/posts', [
            'title'  => 'post1',
            'body'  => 'Sample Post',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::POSTS);
    }

    public function test_get_data()
    {

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/posts');

        $this->assertAuthenticated();
    }

    public function test_update_data()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->put('/posts/1', [
            'title'  => 'postEdit1',
            'body'  => 'Sample Post1',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::POSTS);

    }

    public function test_delete_data()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->delete('/posts/1');

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::POSTS);

    }



}
