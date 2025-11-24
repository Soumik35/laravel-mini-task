<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->user()->tasks()->orderBy('due_date');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('due_date')) {
            $query->whereDate('due_date', $request->due_date);
        }

        $tasks = $query->paginate(10)->withQueryString();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.form');
    }

    public function store(StoreTaskRequest $request)
    {
        Task::create(array_merge($request->validated(), ['user_id' => $request->user()->id]));
        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }

    public function edit(Task $task)
    {
        abort_unless($task->user_id === auth()->id(), 403);
        return view('tasks.form', compact('task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        abort_unless($task->user_id === auth()->id(), 403);
        $task->update($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy(Task $task)
    {
        abort_unless($task->user_id === auth()->id(), 403);
        $task->delete();
        return back()->with('success', 'Task deleted successfully');
    }
}
