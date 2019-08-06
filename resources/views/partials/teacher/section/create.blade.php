@extends('layouts.app')

@section('content')
      
<!--  <div class="w-full h-full"> -->
<!--  <div class="w-full max-w-md mx-auto"> -->
 

<div class="fixed inset-0 w-full p-2 h-screen flex items-center justify-center bg-smoke-50">
 
<div class="w-full sm:w-2/3 md:w-1/2 lg:w-1/3 bg-white shadow-lg rounded-lg p-0 mb-20">
 
    {{-- Begin Heading --}}

    <div class="relative text-center text-gray-700 bg-gray-300 p-2 rounded">

            Create New Class

    </div>

    {{-- Begin Form --}} 

    <form id="create_site" method="POST" action="{{ url('teacher/section') }}">
            {{ csrf_field() }}

            <div class="p-3 border-l-2 border-b-0 border-r-2">
            
                {{-- Begin Title Input--}}
            
                    <div class="mb-2">

                        <label for="title" class="w-full font-semibold text-gray-600 text-sm pt-2 pr-3 align-middle">Title</label>

                            
                        <input id="title" type="text" class="w-full mt-2 rounded h-8 px-2 border text-gray-600 text-sm {{ $errors->has('title') ? 'border-red-500' : 'border' }}" name="title" value="{{ old('title') }}"  autofocus>
                        {!! $errors->first('title', '<span class="text-red-500 text-sm mt-2">:message</span>') !!}

                    </div>


                {{-- Begin Site Input --}}

                    
                    <div class="mb-2">
  
                            <label for="site" class="w-full m-0 font-semibold text-gray-600 text-sm pt-2 pr-3 align-middle">Site</label>

                            <select name="site" class="w-full mt-2 h-8 px-2 border text-gray-600 text-sm leading-tight focus:outline-none">

                             @foreach ($sites as $site)
                                <option class="bg-red-500" value='{{$site->id}}'>{{$site->nickname}}</option>
                             @endforeach

                            </select>
  
                    </div>

                    <div class="my-1 text-center">

                          <a href="{{url('/home')}}" class="inline-block mb-1 md:mb-0 bg-gray-400 hover:bg-red-500 text-gray-700 hover:text-white px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded">Cancel</a>

                          <button type="submit" class="mb-1 md:mb-0 bg-gray-400 hover:bg-green-500 text-gray-700 hover:text-green-100 px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded">Submit</button>

                    </div>
                    
                    </div>
                </form>

    {{-- End Form --}}

</div>
</div>    


        

<!-- 


            </div>
        </div> -->
    </div>
</div>
@endsection






