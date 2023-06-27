{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


@extends('auth.layouts.master')
@section('content')
<div class="login-container" style="margin-top: 150px;">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Sign Up</header>
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name" placeholder="Enter your name" required>
        @error('name')<i class="text-danger">{{$message}}</i>@enderror
        <input type="text" name="email" placeholder="Enter your email" required>
        @error('email')<i class="text-danger">{{$message}}</i>@enderror
        <input type="number" name="mobile" placeholder="Enter your phone number" required>
        @error('mobile')<i class="text-danger">{{$message}}</i>@enderror
        <input type="password" name="password" placeholder="Enter your password" required>
        @error('password')<i class="text-danger">{{$message}}</i>@enderror
        <input type="password" name="password_confirmation" placeholder="Confirm Your Password" required>
        @error('password_confirmation')<i class="text-danger">{{$message}}</i>@enderror
        <button type="submit" class="button" value="Login">Sign Up</button>
    </form>
      <div class="signup">
        <span class="signup">Already have an acoount?
         <a href="{{ route('login') }}" for="check">Sign In</a>
        </span>
      </div>
    </div>
  </div>
@endsection
