<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;

class TasksController extends Controller
{
    public function index()
    {
        return view('tasks.index',
            ['tasks' => Task::all()]);
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

        return redirect('tasks.index')->with('Success', 'Task added!');
    }

    public function edit(Task $task)
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



    public function checkedOut(TaskRequest $request, Task $task): RedirectResponse
    {
        $task->update([
            'completed_at' => $request->get('checked')
        ]);

        return redirect()->route('tasks.index');

    }

        public function recycleBin()
        {

        $tasks = auth()->user()->tasks()->onlyTrashed()->get();

        return view('tasks.recycle', ['tasks' => $tasks]);
        }

    public function show(Task $task)
    {
        return view('tasks.recycle')->with(['task' => $task]);
    }

    public function forceDelete(int $id): RedirectResponse
    {

        $task = Task::withTrashed()->findOrFail($id);
        $task->forceDelete();

        return redirect()->back();
    }

}
