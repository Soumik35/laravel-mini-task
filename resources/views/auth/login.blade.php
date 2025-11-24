@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-2xl mb-4">Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
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
            <label>
                <input type="checkbox" name="remember"> Remember Me
            </label>
        </div>
        <div class="flex justify-between items-center">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Login</button>
            <a href="{{ route('password.request') }}" class="text-blue-500">Forgot Password?</a>
        </div>
    </form>
    <p class="mt-4">Don't have an account? <a href="{{ route('register') }}" class="text-blue-500">Register</a></p>
</div>
@endsection
