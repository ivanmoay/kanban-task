<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    public function test_index()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        // $response = $this->call('GET', 'posts');

        // $response->assertStatus(200);

    }

    public function test_create_task()
    {   
        $response = $this->post('/', [
            'title' => 'Test Title',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'due_date' => '2023-05-04',
            'board_no' => '1',
        ]);

        //$response->assertRedirect(RouteServiceProvider::HOME);
    }
}
