@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                    <div class="block font-bold bg-gray-300 text-center text-gray-600 py-3 px-6 mb-0 text-base ">
                        {{ __('Create an Account') }}
                    </div>

                    <form class="w-full p-6" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="flex flex-wrap mb-6">
                            <label for="firstName" class="block text-gray-500 text-sm font-semibold mb-2">
                                {{ __('First Name') }}:
                            </label>

                            <input id="firstName" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('firstName') ? ' border-red-500' : '' }}" name="firstName" value="{{ old('firstName') }}" required autofocus>

                            @if ($errors->has('firstName'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('firstName') }}
                                </p>
                            @endif
                        </div>

                       <div class="flex flex-wrap mb-6">
                            <label for="lastName" class="block text-gray-500 text-sm font-bold mb-2">
                                {{ __('Last Name') }}:
                            </label>

                            <input id="lastName" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('lastName') ? ' border-red-500' : '' }}" name="lastName" value="{{ old('lastName') }}" required autofocus>

                            @if ($errors->has('lastName'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('lastName') }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="email" class="block text-gray-500 text-sm font-bold mb-2">
                                {{ __('E-Mail Address') }}:
                            </label>

                            <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('email') ? ' border-red-500' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="password" class="block text-gray-500 text-sm font-bold mb-2">
                                {{ __('Password') }}:
                            </label>

                            <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('password') ? ' border-red-500' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap mb-6">
                            <label for="password-confirm" class="block text-gray-500 text-sm font-bold mb-2">
                                {{ __('Confirm Password') }}:
                            </label>

                            <input id="password-confirm" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" required>
                        </div>

                        <div class="flex flex-wrap">
                            
                            <button type="submit" class="inline-block align-middle text-center select-none border font-semibold whitespace-no-wrap py-1 px-2 rounded text-base leading-normal no-underline text-gray-600 bg-gray-300 
                            hover:text-gray-200 hover:bg-gray-500">
                                {{ __('Submit') }}
                            </button>

                            <p class="w-full text-xs text-center text-gray-500 mt-8 -mb-4">
                                Already have an account?
                                <a class="text-red-500 hover:text-red-700 no-underline" href="{{ route('login') }}">
                                    Login
                                </a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
