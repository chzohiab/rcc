<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Login') }}</title>

    <link rel="stylesheet" href="{{ asset('assets/fonts/nunito/Nunito-Light.ttf') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/nunito/Nunito-Medium.ttf') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/nunito/Nunito-Regular.ttf') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/nunito/Nunito-SemiBold.ttf') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/nunito/Nunito-Bold.ttf') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/nunito/Nunito-ExtraBold.ttf') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.min.css" />

    <link rel="stylesheet" href="{{ asset('assets/admin-scss/style.css') }}">
</head>

<body>
    <div class="wrapper">
        <div class="auth-wrapper d-flex align-items-center justify-content-center" style="height:100vh;">
            <div class="card p-4" style="width:500px">
                <h4 class="text-center mb-4">Admin Login</h4>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-group">
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="form-control" type="email" name="email"
                            :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4 form-group">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="form-control" type="password" name="password" required
                            autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-4">
                        @if (Route::has('password.request'))
                            <a class=""
                                href="{{ route('admin.password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-button class="btn btn-primary">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
