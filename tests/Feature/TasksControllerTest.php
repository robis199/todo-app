<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Database\Factories\TaskFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TasksControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_main_page(): void
    {

        $this->actingAs(User::factory()->create());

        $response = $this->get(route('tasks.index'));

        $response->assertStatus(200);
        $response->assertViewIs('tasks.index');
    }

    public function test_create_view(): void
    {

        $this->actingAs((User::factory()->create()));

        $response = $this->get(route('tasks.create'));

        $response->assertStatus(200);
        $response->assertViewIs('tasks.create');
    }

    public function test_store_a_new_task(): void
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $this->followingRedirects();

        $response = $this->post(route('tasks.store'), [
            'user_id' => $user->id,
            'title' => 'title',
            'description' => 'description'
        ]);

        $this->assertDatabaseHas('tasks', [
            'user_id' => $user->id,
            'title' => 'title',
            'description' => 'description'
        ]);
        $response->assertStatus(200);

    }

    public function test_edit_view(): void
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $task = Task::factory()->create([
            'user_id' => $user->id
        ]);

        $response = $this->get(route('tasks.edit', $task));

        $response->assertStatus(200);
        $response->assertViewIs('tasks.edit');

    }


    public function test_update(): void
    {
        $this->actingAs((User::factory()->create()));

        $task = Task::factory()->create([
            'user_id' => $user->id
        ]);

        $this->followingRedirects();
        $response = $this->put(route('tasks.update', $task), [
            'title' => 'sgjdspgkpodspo',
            'description' => 'sdfsdofjdsof'
        ]);

        $this->assertDatabaseHas('tasks', [
            'user_id' => $user->id,
            'title' => 'string',
            'description' => 'dhdghdffd'
        ]);
        $response->assertStatus(200);
    }


    public function test_delete(): void
    {

        $user = User::factory()->create();
        $this->actingAs($user);

        $task = Task::factory()->create([
            'user_id' => $user->id
        ]);

        $this->followingRedirects();
        $response = $this->delete(route('tasks.destroy', $task));

        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id
        ]);
        $response->assertStatus(200);
    }

    public function test_task_complete(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $task = Task::factory()->create([
            'user_id' => $user->id,
            'completed_at' => now(),
        ]);

        $this->followingRedirects();

        $response = $this->put(route('tasks.complete', $task),  ['complete' => now()]);


        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'user_id' => $user->id,
            'completed_at' => now()
        ]);

             $response->assertStatus(200);
    }

}
