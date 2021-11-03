<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TasksControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_home(): void
    {

        $this->actingAs((User::factory()->create()));

        $response = $this->get('/tasks');

        $response->assertStatus(200);
        $response->assertViewIs('/tasks');
    }

    public function test_create_view(): void
    {

        $this->actingAs((User::factory()->create()));

        $response = $this->get(route('tasks.create'));

        $response->assertStatus(200);
        $response->assertViewIs('tasks.create');
    }

    public function test_store(): void
    {

        $this->actingAs((Task::factory()->create()));

        $task = new Task;

        $task->save();

        $this->assertEquals($task,$task->save());
    }

    public function test_edit_view(): void
    {

        $this->actingAs((User::factory()->create()));

        $response = $this->get(route('tasks.edit'));

        $response->assertStatus(200);
        $response->assertViewIs('tasks.edit');
    }


    public function test_update(): void
    {

        $this->actingAs((Task::factory()->update()));

        $task = new Task;

        $task->update();

        $this->assertEquals($task,$task->update());
    }


    public function test_delete(): void
    {

        $this->actingAs((Task::factory()->delete()));

        $task = new Task;

        $task->delete();

        $this->assertEquals($task->delete());
    }




}
