<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->user()->id)
            ->orderBy('id', 'ASC')
            ->tasks()
            ->get();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(TaskRequest $request): RedirectResponse
    {
        $task = (new Task([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ]));

        $task->user()->associate(auth()->user());
        $task->save();
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task) //Task::findOrFail()
    {
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(TaskRequest $request, Task $task): RedirectResponse
    {
        $task->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ]);
        return redirect()->route('tasks.edit', $task);
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }

    public function complete(Task $task): RedirectResponse
    {
        $task->update([
            'completed_at' => now()
        ]);
        return redirect()->back();
    }

}
