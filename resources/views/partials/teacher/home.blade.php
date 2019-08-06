@extends('layouts.app')

@section('content')
  
<div class="flex items-center p-4">
    
        {{-- Begin Container --}}     

        <div class="w-full m-0 p-0">

            {{-- Begin Class Section --}} 

            <div class="flex text-gray-600 mb-2">

                <div class="flex">

                @if (Auth::User()->sections()->count() > 1)

                CLASSES

                @else

                CLASS 

                @endif

                    {{-- Add Class Icon--}}
 
                    <a class="no-underline aliased" href="{{action('SectionController@create')}}">
                    @icon('icon-plus-square', ['class' => 'w-4 h-4 float-right ml-1 fill-current'])</a>

                </div>

            </div>

                {{--  Begin Tabbed Class Selection on > Small Displays --}}
        
                <div class="hidden sm:block container-full h-full border-2 mb-2">
            
                    {{-- Tab Wrapper --}}

                    <div class="pr-1 flex flex-wrap">
                        
                        @if (Auth::User()->sections()->count() > 0)

                            @foreach ( Auth::User()->sections as $section)   

                             <div class="flex">
                                   
                                    <a class="p-2 no-underline text-sm aliased my-1 ml-1 text-gray-500 border-gray-500 border-2 hover:bg-gray-300 hover:text-gray-700

                                    {{active_check('teacher/section/'.$section->id)}}"
                                    
                                    href="{{action('SectionController@show', $section->id)}}">
                                    {{ $section->title}}</a>

                                </div>
                        
                            @endforeach

                        @else

                        <div class="p-2">    

                        <p>You are currently have no assigned classes.</p>

                        </div>

                        @endif

                </div>
            </div>

        {{--  Begin Dropdown on small displays --}}

            <div class="sm:hidden">
                        
                <div class="bg-gray-100 sm:hidden py-2 flex flex-wrap w-full border-2">

                {{-- Begin Class Dropdown --}}

                


                    <div class="sm:hidden">
                        
                        <div class="sm:hidden px-2 py-0 flex flex-wrap w-full border-0">
                    
                            <select class="p-2 bg-gray-100 text-gray-600 text-sm" onchange="location = this.value;">
        
<!--                                  <option value="">Choose a Class...</option>
 -->
                                 @foreach ( Auth::User()->sections as $section)                         

                                 <option value="{{action('SectionController@show', $section->id)}}">


                                    <a class="p-2 no-underline text-sm font-bold text-grey-700" href="{{action('SectionController@show', $section->id)}}">
                                        {{ $section->title}}
                                    </a>

                                </option>

                                 @endforeach

                            </select>
                        
                        </div> 

                    </div>

                </navigation>

            </div>

    </div>
</div>
        </div>
    </div>

@endsection
