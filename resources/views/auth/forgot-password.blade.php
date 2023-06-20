{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('auth.layouts.master')
@section('content')
<div class="login-container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Forget Your Password</header>
      <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
      <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <input type="text" name="email" placeholder="Enter your email" required>
        @error('email')<i class="text-danger">{{$message}}</i>@enderror
        <button type="submit" class="button" value="Login">Email Password Reset Link</button>
      </form>
      <div class="signup">
        <span class="signup">Already have an acoount?
         <a href="{{ route('login') }}" for="check">Sign In</a>
        </span>
      </div>
    </div>
  </div>
@endsection

