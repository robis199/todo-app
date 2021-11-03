<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        return view('tasks.index', ['task' => Task::all()]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request): \Illuminate\Http\RedirectResponse
    {
        (new Task([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ]))->save();
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(TaskRequest $request, Task $task): \Illuminate\Http\RedirectResponse
    {
        $task->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ]);
        return redirect()->route('tasks.edit', $task);
    }

    public function destroy(Task $task): \Illuminate\Http\RedirectResponse
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }


}
