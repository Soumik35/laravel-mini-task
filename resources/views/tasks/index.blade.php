@extends('layouts.app')

@section('content')
<div class="flex justify-between mb-4">
    <h2 class="text-xl font-bold">Your Tasks</h2>
    <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add Task</a>
</div>

<table class="w-full bg-white p-4 shadow rounded">
    <tr>
        <th class="p-2">Title</th>
        <th class="p-2">Status</th>
        <th class="p-2">Due Date</th>
        <th class="p-2">Actions</th>
    </tr>

    @foreach($tasks as $task)
    <tr class="border-b">
        <td class="p-2">{{ $task->title }}</td>
        <td class="p-2">{{ ucfirst($task->status) }}</td>
        <td class="p-2">{{ $task->due_date }}</td>
        <td class="p-2">
            <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500">Edit</a>

            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                @csrf @method('DELETE')
                <button class="text-red-500 ml-2">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<div class="mt-4">
    {{ $tasks->links() }}
</div>

@endsection
