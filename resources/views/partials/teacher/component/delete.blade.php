@extends('layouts.app')

@section('content')
      
<!--  <div class="w-full h-full"> -->
<!--  <div class="w-full max-w-md mx-auto"> -->
 

<div class="fixed inset-0 w-full p-2 h-screen flex items-center justify-center bg-smoke-50">
 
<div class="w-full sm:w-2/3 md:w-1/2 lg:w-1/3 bg-white shadow-lg rounded-lg p-0 mb-20">
 
    {{-- Begin Heading --}}

    <div class="relative text-center text-gray-700 bg-gray-300 p-2 rounded">

    DELETE COMPONENT</div>

    {{-- Begin Form --}} 

    <form id="delete_component" method="POST" action="{{ action('ComponentController@destroy', ['section' => $section, 'assignment' => $assignment, 'component' => $component]) }}">
    
    {{ csrf_field() }}

           <input type="hidden" name="_method" value="DELETE">

            <div class="p-3 border-l-2 border-b-0 border-r-2">
                    
                    <div class="text-gray-600 p-2 text-center mb-6">Are you sure you want to delete {{$component->title}}?
                    </div>
               
       
                    <div class="my-1 text-center">

                          <a href="{{url('/home')}}" class="inline-block mb-1 md:mb-0 bg-gray-400 hover:bg-gray-500 text-gray-700 hover:text-white px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded">Cancel</a>

                          <button type="submit" class="mb-1 md:mb-0 bg-gray-400 hover:bg-red-500 text-gray-700 hover:text-red-100 px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded">Delete</button>

                    </div>
                    </div>
                
                </form>

    {{-- End Form --}}

</div>
</div>    

    </div>
</div>
@endsection






