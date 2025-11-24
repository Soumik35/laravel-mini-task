@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded shadow text-center">
    <h2 class="text-2xl mb-4">Verify Your Email Address</h2>
    @if(session('status') == 'verification-link-sent')
        <div class="mb-4 p-2 bg-green-200">A new verification link has been sent to your email.</div>
    @endif
    <p>Before proceeding, please check your email for a verification link.</p>
    <form method="POST" action="{{ route('verification.send') }}" class="mt-4">
        @csrf
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Resend Verification Email</button>
    </form>
</div>
@endsection
