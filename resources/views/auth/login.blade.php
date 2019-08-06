@extends('layouts.app')

@section('content')
   
    <div class="container mx-auto">
        
        <div class="flex flex-wrap justify-center">
            
            <div class="w-full max-w-sm">
                
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                    <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        {{ __('Login') }}
                    </div>

                    @include('partials.form_login')

                </div>
            </div>
        </div>
    </div>
@endsection
