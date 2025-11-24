@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-2xl mb-4">Register</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-4">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required class="w-full border p-2 rounded">
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full border p-2 rounded">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label>Password</label>
            <input type="password" name="password" required class="w-full border p-2 rounded">
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" required class="w-full border p-2 rounded">
        </div>
        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Register</button>
    </form>
    <p class="mt-4">Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Login</a></p>
</div>
@endsection
