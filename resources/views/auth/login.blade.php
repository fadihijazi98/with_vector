@extends('layouts.app')

@section('content')
<div class="bg-gray-300 mx-auto h-full flex justify-center items-center">
    <div class="w-96 p-6 rounded-lg bg-blue-900 shadow-xl">
        <div class="bg-blue-900 p-4 rounded">

            <!-- logo section -->
            <div class="icon_app text-white text-4xl">
                <h1>f<span class="border-b-2">di --</span></h1>
            </div>

            <!-- welcome section -->
            <div class="text-white mt-10">
                <p class="text-3xl">Welcome Back</p>
                <p class="text-blue-300">Enter your information below</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="pt-10">
                @csrf
                <!-- email -->
                <div class="relative shadow-x">
                    <label for="email" class="pl-2 pt-2 uppercase text-blue-500 text-xs font-bold absolute">{{ __('E-Mail Address') }}</label>

                    <div>
                        <input id="email" type="email" placeholder="email@email.email" class="pt-8 rounded p-3 outline-none bg-blue-800 text-gray-100 focus:bg-blue-700 w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off" autofocus>

                        @error('email')
                        <span class="text-sm text-red-600 pl-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <!-- password -->
                <div class="relative pt-3 shadow-x">
                    <label for="password" class="pl-2 pt-2 uppercase text-blue-500 text-xs font-bold absolute">{{ __('Password') }}</label>

                    <div>
                        <input id="password" type="password" placeholder="Password" class="pt-8 rounded p-3 outline-none bg-blue-800 text-gray-100 focus:bg-blue-700 w-full  @error('password') is-invalid @enderror" name="password" autocomplete="off">

                        @error('password')
                        <span class="text-sm text-red-600 pl-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <!-- remeper me -->
                <div class="pt-2">
                    <div class="">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="text-white" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <!-- button -->
                <div class="pt-2 pb-2">
                    <button type="submit" class="uppercase font-bold text-left bg-gray-400 text-blue-800 w-full bg-white py-2 px-3 rounded shadow">
                        {{ __('Login') }}
                    </button>
                </div>

                <!-- forget -->
                <div class="flex pt-8 text-white justify-between text-sm font-bold">

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>

                    <a class="btn btn-link" href="{{ route('register') }}">
                        Register
                    </a>

                </div>

            </form>

        </div>
    </div>
</div>
@endsection
