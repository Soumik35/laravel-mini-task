@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-2xl mb-4">Confirm Password</h2>
    <p class="mb-4">Please confirm your password before continuing.</p>
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <div class="mb-4">
            <label>Password</label>
            <input type="password" name="password" required class="w-full border p-2 rounded">
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Confirm Password</button>
    </form>
</div>
@endsection
