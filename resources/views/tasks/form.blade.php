@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">{{ isset($task) ? 'Edit Task' : 'Add Task' }}</h2>

<form action="{{ isset($task) ? route('tasks.update', $task->id) : route('tasks.store') }}"
      method="POST"
      class="bg-white p-6 shadow rounded">
    @csrf
    @if(isset($task)) @method('PUT') @endif

    <div class="mb-4">
        <label class="block mb-2">Title</label>
        <input type="text" name="title" class="w-full border p-2"
               value="{{ old('title', $task->title ?? '') }}" required>
    </div>

    <div class="mb-4">
        <label class="block mb-2">Description</label>
        <textarea name="description" class="w-full border p-2">{{ old('description', $task->description ?? '') }}</textarea>
    </div>

    <div class="mb-4">
        <label class="block mb-2">Status</label>
        <select name="status" class="w-full border p-2">
            @foreach(['pending','in-progress','completed'] as $status)
                <option value="{{ $status }}"
                    {{ isset($task) && $task->status === $status ? 'selected' : '' }}>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block mb-2">Due Date</label>
        <input type="date" name="due_date" class="w-full border p-2"
               value="{{ old('due_date', $task->due_date ?? '') }}" required>
    </div>

    <button class="bg-blue-500 text-white px-4 py-2 rounded">
        {{ isset($task) ? 'Update Task' : 'Create Task' }}
    </button>
</form>
@endsection
