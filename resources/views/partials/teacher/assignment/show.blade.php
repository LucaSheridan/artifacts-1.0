@extends('layouts.app')

@section('content')
  
<div class="flex items-center p-4">
    
    <div class="w-full">

        {{-- Begin Container --}}    

            <div class="m-0 p-0 border-0">

        {{-- Class Navigation Title --}}

            <div class="text-gray-600 mb-2">CLASS</div>

        {{--  Show Tabs on Small Displays or Larger --}}
        
            <div class="hidden sm:block container-full h-full border-2">
            <div class="pr-2 flex flex-wrap bg-lighter">
                        
                {{-- Tabs --}}
                    
                    @if (Auth::User()->sections()->count() > 0)

                    <div class="flex flex-wrap">    

                        @foreach ( Auth::User()->sections as $section)                         
                               
                        <div class="flex">
                               
                            <a class="p-2 no-underline text-sm aliased my-1 ml-1 text-gray-500 border-gray-500 border-2 hover:bg-gray-300 hover:text-gray-700 {{active_check('teacher/section/'.$section->id.'/*')}}"
                            href="{{action('SectionController@show', $section->id)}}">{{ $section->title}}</a>

                        </div>
                        
                        @endforeach
                            
                    </div>
            
                    @else

                    <div class="p-2">    

                        <p>You are currently have no assigned classes.</p>

                         <button
                        
                         class="bg-gray-400 hover:bg-gray-600 text-gray-700 hover:text-white m-2 px-4 py-2 text-sm uppercase tracking-wide font-semibold rounded">Create a New Class
                         
                         </button>

                    </div>

                    @endif

                {{-- End Class Tabs --}}            
    
                </div>
            </div>

        {{--  End Tabbed Inteface, Begin Dropdown on small displays --}}

                   
            <div class="sm:hidden">
                        
                    <div class="bg-gray-100 sm:hidden py-2 flex flex-wrap w-full border-2">

         
                    {{-- Begin Class Dropdown --}}

                    <div class="inline-block relative w-full text-center">
  
                        <select class="block rounded-none w-full bg-gray-100 border-gray-300 border-0 text-gray-600 text-sm leading-tight focus:outline-none" onchange="location = this.value;">

                            <option class="" value="{{action('SectionController@show', $section->id) }}">{{$activeSection->title}}</option>
        
                                @foreach ( Auth::User()->sections as $section )                         
                                           
                                            @if ( $section->id == $activeSection->id ) 
                                            @else
                                                <option value="{{action('SectionController@show', $section->id) }}">{{ $section->title}}</option>
                                            @endif
                            
                                @endforeach

                        </select>
  
                    </div>

        {{-- End Class Dropdown --}}

            <!-- </div>  -->

                    </div>
            </div>
            
            <div class="flex flex-shrink flex-wrap items-stretch items-center h-full">


            {{-- Begin Assignment Div --}}

            <div class="w-full sm:w-1/2 md:border-r-8 sm:border-gray-100">

                {{-- Assignment Wrapper--}}

                <div class="w-full py-2">

                <div class="my-1 text-gray-600">

                  <!--   @if ($activeAssignment->is_complex) COMPLEX
                    @else
                        SIMPLE
                    @endif -->

                ASSIGNMENT
                </div>


                 {{-- Begin Assignment Dropdown --}}

                    <div class="inline-block relative w-full text-center">
  
                        <div class="border-2 py-2 text-sm text-gray-700">

                             <select class="block rounded-none w-full bg-gray-100 border-gray-300 border-0 text-gray-600 text-sm leading-tight focus:outline-none" onchange="location = this.value;">

                                  <option class="" value="">
                                  {{$activeAssignment->title}}</option>

                                  @foreach ($sectionAssignments as $assignment) 

                                        @if ( $assignment->id == $activeAssignment->id ) 
                                            
                                        @else
                                                
                                        <option class="" value="{{action('AssignmentController@show', [$activeSection->id, $assignment->id])}}">
                                        {{$assignment->title}}</option>

                                        @endif
             
                                  @endforeach

                            </select>
  
                        </div>

                {{-- End Assignment Dropdown --}}
                        
                </div>

                   <div class="mb-1 mt-2 text-gray-600">DESCRIPTION</div>
                    
                   <div class="text-sm border-2 p-2 text-gray-600 leading-tight">

                        {{$activeAssignment->description}}    

                    </div>

                    {{-- End Assignment Wrapper --}}
                
                </div>

            {{-- End Assignment Div --}}
             
             </div>


            {{-- Begin Components Div --}}

            <div class="w-full sm:w-1/2 bg-grey-lighter sm:border-l-8 sm:border-gray-100">

                {{-- Component Wrapper--}}

                    <div class="w-full bg-gray-100">

                    <div class="mb-1 mt-0 sm:mt-3 text-gray-600">
                    
                    @if ($activeAssignment->is_complex)

                    {{-- Add Component Button --}}

                        <span class="float-right mb-2 text-gray-600"><a href="{{action('ComponentController@create', ['section' => $activeAssignment->section_id ,'assignment' => $activeAssignment])}}">[+]</a>
                        </span>

                        <div class="mb-1 mt-0 sm:mt-3 text-gray-600">DUE DATES
                        @else
                        <div class="mb-1 mt-0 sm:mt-3 text-gray-600">DUE DATE
                        @endif
                    
                    </div>

                     <div class="border-2 p-0">



                            @foreach ( $activeAssignment->components as $component )

                            <div class="text-gray-600 text-sm bg-gray-100">
                            
                                <div class="p-2 text-gray-600 text-sm bg-gray-100 hover:bg-gray-300">
                                    <a href="#" class="text-gray-600 no-underline text-sm hover:text-red-500 ">
                                    {{ $component->title }}</a>

                                    <span class="float-right ml-2 hover:text-red-500">
                                    [<a href="{{ action('ComponentController@delete', ['component' => $component->id, 'section' => $activeSection->id,
                                    'assignment' => $activeAssignment->id]) }}" class="">delete</a>]
                                    </span>

                                    <span class="float-right ml-2 hover:text-red-500">
                                    [<a href="{{action('ComponentController@edit', [
                                    'component' => $component->id,
                                    'section' => $activeSection->id,
                                    'assignment' => $activeAssignment->id])}}" class="">edit</a>]</span>

                                    <span class="float-right"> 
                                    Due {{ Carbon\Carbon::parse($component->date_due)->format('n/j/y') }}
                                    </span>

                                </div>

                            </div>

                            @endforeach

                        </div>

            {{-- End Components Wrapper --}}

            </div>
                
            {{-- End Components --}}

            </div>


    </div>
</div>
        </div>
    </div>

@endsection

