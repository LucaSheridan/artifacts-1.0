@extends('layouts.app')

@section('content')
  
<div class="flex items-center p-4">
    
        {{-- Begin Container --}}    

        <div class="w-full m-0 p-0">

            {{-- Begin Class Section --}} 

            <div class="text-gray-600 mb-2">

                    <div class="flex">CLASS

                        {{-- Add Class Icon--}}
                        <a class="no-underline aliased" href="{{action('SectionController@edit', $activeSection)}}">
                        @icon('icon-edit', ['class' => 'w-4 h-4 float-right ml-1 fill-current'])</a>
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

                        <div class="flex p-2">    

                            <p>You are currently have no assigned classes.</p>

                        </div>

                        @endif
            
                           

                </div>
            </div>

        {{--  Begin Class Dropdown on small displays --}}

            <div class="sm:hidden">
                        
                <div class="bg-gray-100 sm:hidden py-2 flex flex-wrap w-full border-2">

                {{-- Begin Class Dropdown --}}

                    <div class="inline-block relative w-full text-center">
  
                        <select class="block rounded-none w-full bg-gray-100 border-gray-300 border-0 text-gray-600 text-sm leading-tight focus:outline-none" onchange="location = this.value;">

                            <option class="" value="{{action('SectionController@show', $section->id) }}">{{$activeSection->title}}</option>
        
                                @foreach ( Auth::User()->sections as $section)                         
                                           
                                            @if ( $section->id == $activeSection->id ) 
                                            @else
                                                <option value="{{action('SectionController@show', $section->id) }}">{{ $section->title}}</option>
                                            @endif
                            
                                @endforeach

                        </select>
  
                    </div>

        {{-- End Dropdown --}}

            <!-- </div>  -->

                    </div>
            </div>

            <!-- Begin Section Title -->

            <h1>{{$activeSection->title}}</h1>


            
            <div class="flex flex-shrink flex-wrap items-stretch items-center h-full">


            {{-- Begin Assignment Div --}}

            {{--  Show Assignments Dropdown on < Small Screens  --}}

            <div class="sm:hidden">

                <div class="text-gray-600 mb-2 mt-3">ASSIGNMENTS ({{$sectionAssignments->count()}})</div>

                    <div class="flexbg-gray-100 sm:hidden py-2 w-full border-2">
         
                    {{-- Begin Assignment Dropdown--}}

                    <div class="inline-block relative w-full text-center">
  
                        <select class="block rounded-none w-full bg-gray-100 border-gray-300 border-0 text-gray-600 text-sm leading-tight focus:outline-none" onchange="location = this.value;">
        
                                @foreach ( $sectionAssignments as $assignment)                         
                                           
                                    <option value="{{action('AssignmentController@show', ['assignment' => $assignment->id , 'section' => $activeSection->id])}}" >{{ $assignment->title}}</option>
                            
                                @endforeach

                                 @if ($sectionAssignments->count() < 1) 
                                 <option value="{{action('AssignmentController@create',  $activeSection->id)}}">No Assignments</option>
                                 @else
                                 @endif

                                 <option value="{{action('AssignmentController@create',  $activeSection->id)}}">Create New Assignment</option>

                        </select>
                    </div>

             {{-- End Assignment Dropdown --}}

                    </div>
                </div>

        {{--  Show Assignment Table on > Small Screens --}}

                <div class="hidden sm:block w-full sm:w-1/2 md:border-r-8 sm:border-gray-100">

        {{-- Assignment Table Wrapper--}}

        <div class="w-full py-2">

                    {{-- Add Assignment Button --}}

                    <span class="float-right mt-1 text-gray-600"><a href="{{action('AssignmentController@create', $activeSection->id)}}">[+]</a>
                    </span>

                    {{-- Assignment Table Title--}}

                    <div class="mt-1 mb-2 text-gray-600">
                    ASSIGNMENTS ({{ $sectionAssignments->count() }}) 
                    </div>

                {{-- Begin Accordion Wrapper --}}

                    <div id="accordion" class="border-2 p-0">

                @if ($sectionAssignments->count() > 0)

                    @foreach ($sectionAssignments as $assignment)

                    <accordion class="block bg-gray-100 hover:bg-gray-300 m-0 p-2">
            
                        <div slot="header">
                    
                        <a href="{{action('AssignmentController@show', ['assignment' => $assignment->id , 'section' => $activeSection->id])}}" class="text-gray-600 no-underline text-sm hover:text-red-500"><b>{{$assignment->title}}</b></a>

                            {{-- Add Due Date to Header if Simple Assignment --}}

                            @if (!$assignment->is_complex)
                                <span class="float-right text-sm text-gray-600">
                                @foreach ( $assignment->components as $component )
                                {{ Carbon\Carbon::parse($component->date_due)->format('n/j/y') }}
                                @endforeach
                                </span>
                            @else
                                <span class="float-right text-sm text-gray-600">
                                </span>
                            @endif
                
                        @if (!$assignment->is_complex)

                    </accordion>

            @else

                    <div class="block body text-gray-600 text-sm hover:bg-gray-300 mt-2 mb-0">
                                                                                  
                    @foreach ( $assignment->components as $component )
        
                    <div class="p-1 mt-1">
            
                    <a href="#" class="p-0 m-0 hover:text-red-400 no-underline text-sm">
                    {{ $component->title}}</a>

                    <span class="float-right">
                    {{ Carbon\Carbon::parse($component->date_due)->format('n/j') }}</span>

                    </div>
            
                    @endforeach

                                </div>                                            


                     @endif
        
                    </div>                                            
                     </accordion>

                            @endforeach

                            @else
           
                                <div class="text-gray-600 p-2 no-underline text-sm">No assignments
                                </div>            
                            
                            @endif

                        </div>
                                           
                    {{-- End Assignment Wrapper --}}
                
                </div>

            {{-- End Assignment Div --}}

            </div>

            {{-- Begin Students Div --}}

            <div class="w-full sm:w-1/2 bg-grAY-100 sm:border-l-8 sm:border-gray-100">

                {{-- Student Wrapper--}}

                <div class="w-full py-2">

                    <div class="mt-1 mb-2 text-gray-600">STUDENTS ({{$activeSection->students->count()}})</div>

                        <div class="border-2">

                        @if ( $activeSection->students->count() > 0)

                            @foreach ( $activeSection->students as $student )

                                    <div class="p-2 text-gray-600 text-sm bg-gray-100 hover:bg-gray-300">
                                    <a href="#" class="text-gray-700 no-underline text-sm hover:text-red-300">
                                    {{ $student->fullName}}</a>
                                    </div>

                            @endforeach

                        @else
                                    <div class="p-2 text-gray-600 text-sm">
                                         No students are currently enrolled in this class.
                                    </div>
                        @endif

                        </div>

                {{-- End Students Wrapper --}}
                
                </div>

            {{-- End Assignments --}}

            </div>
        </div>
    
    {{-- End Container --}}

    </div>
</div>

<!-- <script>
  Vue.component('accordion', {
  props: ['theme'],
  
  template: `<div class="accordion">
    
    <div class="header" v-on:click="toggle">
      <slot name="header"></slot>
    </div>
    
    <transition name="accordion"
      v-on:before-enter="beforeEnter" v-on:enter="enter"
      v-on:before-leave="beforeLeave" v-on:leave="leave">
      
      <div class="body" v-show="show">
        <div class="body-inner">
          <slot></slot>
        </div>
      </div>
    </transition>
  </div>`,

  data() {
    return {
      show: 
    };
  },
  
  methods: {
    toggle: function() {
      this.show = !this.show;
    },
  
    beforeEnter: function(el) {
      el.style.height = '0';
    },
    enter: function(el) {
      el.style.height = el.scrollHeight + 'px';
    },
    beforeLeave: function(el) {
      el.style.height = el.scrollHeight + 'px';
    },
    leave: function(el) {
      el.style.height = '0';
    }
  }
});

const vm = new Vue({
  el: '#accordion'
});
  </script> -->

</body>

@endsection

