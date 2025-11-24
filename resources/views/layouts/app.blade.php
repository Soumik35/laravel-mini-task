<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<nav class="bg-white shadow p-4 flex justify-between">
    <a href="{{ route('tasks.index') }}" class="font-semibold">Task Manager</a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="text-red-500">Logout</button>
    </form>
</nav>

<div class="container mx-auto p-6">
    @if(session('success'))
        <div class="bg-green-200 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>
