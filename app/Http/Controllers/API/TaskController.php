<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
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


        $tasks = $query->paginate(10);


        return TaskResource::collection($tasks)->response();
    }


    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;


        $task = Task::create($data);


        return (new TaskResource($task))->response()->setStatusCode(201);
    }


    public function update(UpdateTaskRequest $request, Task $task)
    {
        if ($task->user_id !== $request->user()->id) {
        return response()->json(['message' => 'Forbidden'], 403);
        }


        $task->update($request->validated());


        return new TaskResource($task);
    }


    public function destroy(Request $request, Task $task)
    {
        if ($task->user_id !== $request->user()->id) {
        return response()->json(['message' => 'Forbidden'], 403);
        }


        $task->delete();


        return response()->json(null, 204);
    }
}