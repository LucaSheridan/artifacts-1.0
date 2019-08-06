<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body class="bg-gray-200 h-screen antialiased leading-none relative">
<div id="app" class="flex flex-col">
   <!--  @if(Route::has('login'))
        <div class="absolute top-0 right-0 mt-4 mr-4">
            @auth
                <a href="{{ url('/home') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Home') }}</a>
            @else
                <a href="{{ route('login') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase pr-6">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Register') }}</a>
                @endif
            @endauth
        </div>
    @endif
 -->
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-4 flex flex-col justify-around h-full">
            
                
                <h1 class="text-gray-600 text-center font-thin tracking-wider pt-4 pb-1 border-t-2 border-b-2 border-gray-600">
                ARTIFACTS</h1>

                <div class="text-center text-gray-400 mb-4 tracking-wider">
                <!-- Online Tools for Art Education -->
                <!-- Digital Art Portfolios -->
                </div>

                <div class="flex flex-col md:flex-row items-center justify-center">

                <button
                class="w-full mb-1 md:flex-grow md:mb-0 bg-gray-400 hover:bg-gray-600 text-gray-700 hover:text-white mx-2 px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded"
                @click="showModal = 'login'">Login
                </button>
    
                <card-modal v-if="showModal === 'login'" @close="showModal = false" v-cloak>
                     
                         <template v-slot:header>
                        Login
                         </template>   

                         <form class="w-full p-6" method="POST" action="{{ route('login') }}">

                        @csrf

                        <!-- Email -->

                            <div class="flex flex-wrap mb-4">

                                
                                <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">
                                    {{ __('E-Mail') }}:
                                </label>

                                <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('email') ? ' border-red-500' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                            </div>

                        <!-- Password -->

                            <div class="flex flex-wrap mb-4">
                                
                                <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">
                                    {{ __('Password') }}:
                                </label>

                                <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('password') ? ' border-red-500' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <p class="text-red-500 text-xs italic mt-4">
                                            {{ $errors->first('password') }}
                                        </p>
                                    @endif
                            </div>

                            <div class="flex flex-wrap items-center justify-center">
        
                            <button type="submit" class="bg-gray-400 hover:bg-gray-600 text-gray-700 hover:text-white px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded focus:outline-none focus:shadow-none">
                            Submit
                            </button>


                            </div>
                    </form> 

                </card-modal>

                <button
                class="w-full md:flex-grow bg-gray-400 hover:bg-gray-600 text-gray-700 hover:text-white px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded"
                @click="showModal = 'register'">Register
                </button>
    
                <card-modal v-if="showModal === 'register'" @close="showModal = false" v-cloak>
                
                    <template v-slot:header>
                    Register
                    </template>   


                    <form class="w-full p-6" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="flex flex-wrap mb-4">
                            <label for="firstName" class="block text-gray-500 text-sm font-semibold mb-2">
                                {{ __('First Name') }}:
                            </label>

                            <input id="firstName" type="text" class="shadow appearance-none border rounded w-full py-1 px-1 text-gray-700 leading-tight focus:outline-none  focus:shadow-outline{{ $errors->has('firstName') ? ' border-red-500' : '' }}" name="firstName" value="{{ old('firstName') }}" required autofocus>

                            @if ($errors->has('firstName'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('firstName') }}
                                </p>
                            @endif
                        </div>

                       <div class="flex flex-wrap mb-4">
                            <label for="lastName" class="block text-gray-500 text-sm font-bold mb-2">
                                {{ __('Last Name') }}:
                            </label>

                            <input id="lastName" type="text" class="shadow appearance-none border rounded w-full py-1 px-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline{{ $errors->has('lastName') ? ' border-red-500' : '' }}" name="lastName" value="{{ old('lastName') }}" required autofocus>

                            @if ($errors->has('lastName'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('lastName') }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap mb-4">
                            <label for="email" class="block text-gray-500 text-sm font-bold mb-2">
                                {{ __('E-Mail Address') }}:
                            </label>

                            <input id="email" type="email" class="shadow appearance-none border rounded w-full py-1 px-1 text-gray-700 leading-tight focus:outline-none  focus:shadow-outline{{ $errors->has('email') ? ' border-red-500' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap mb-4">
                            <label for="password" class="block text-gray-500 text-sm font-bold mb-2">
                                {{ __('Password') }}:
                            </label>

                            <input id="password" type="password" class="shadow appearance-none border rounded w-full py-1 px-1 text-gray-700 leading-tight focus:outline-none  focus:shadow-outline{{ $errors->has('password') ? ' border-red-500' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>

                        <div class="flex flex-wrap mb-4">
                            <label for="password-confirm" class="block text-gray-500 text-sm font-bold mb-2">
                                {{ __('Confirm Password') }}:
                            </label>

                            <input id="password-confirm" type="password" class="shadow appearance-none border rounded w-full py-1 px-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation" required>
                        </div>

                        <div class="flex flex-wrap items-center justify-center">
        
                            <button type="submit" class="bg-gray-400 hover:bg-gray-600 text-gray-700 hover:text-white px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded focus:outline-none focus:shadow-none mt-1">
                            Submit
                            </button>


                            <p class="w-full text-xs text-center text-gray-500 mt-6">
                                Already have an account?
                                <a class="text-grey-500 hover:text-grey-700 no-underline" @click="showModal = 'login'">
                                    Login
                                </a>
                            </p>
                        </div>
                    </form>

                  <!--   <buxtton
                class="w-full mb-1 md:flex-grow md:mb-0 bg-gray-400 hover:bg-gray-600 text-gray-700 hover:text-white mx-2 px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded"
                @click="showModal = 'login'">Already have an account? Login
                </button> -->

                   <!--  <button
                    class="mt-6 bg-grey-300 text-white px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded"
                    @click="showModal = false">
                    Close
                    </button>  --> 

                 </card-modal>
            
            </div>
        </div>
    </div>
</div>
</body>
</html>
