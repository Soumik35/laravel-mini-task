@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow">
    <h2 class="text-2xl mb-4">Forgot Password</h2>
    @if(session('status'))
        <div class="mb-4 p-2 bg-green-200">{{ session('status') }}</div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-4">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required class="w-full border p-2 rounded">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Send Password Reset Link</button>
    </form>
</div>
@endsection
