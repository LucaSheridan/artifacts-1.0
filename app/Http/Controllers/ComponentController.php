<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Component;
use App\Section;
use App\Assignment;
use Carbon\Carbon;

class ComponentController extends Controller
{
    
	/**
     * Show the form for creating a new assignment component.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Section $section, Assignment $assignment)
    {
        //dd($section);
        //dd($assignment);

        return view('partials.teacher.component.create')->with(compact('section','assignment'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($component)
    {
        return view('component.show')->with('component', $component);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section, Assignment $assignment, Component $component)
    {

        $component = Component::findOrfail($component->id);

        //dd($component);

        return view('partials.teacher.component.edit')->with(compact('section','assignment','component'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Section $section, Assignment $assignment)
    {
     	
     	//dd($request->date_due);

        $this->validate($request, [
        
        'title' => 'required',
        'date_due' => 'date_format:"m-d-y"|required',

        ]);
        
        //create a new component instance
        $component = New Component;

        //set and title information
        $component->title = $request->input('title');

        //set assignment id 
        $component->assignment_id = $assignment->id;
        
        //set component date due

        $date_due = Carbon::createFromFormat('m-d-y', $request->input('date_due'));

        //set component time due
        $date_due->hour = 23;
        $date_due->minute = 59;
        $date_due->second = 59;

        $date_due->toDateTimeString(); 
        $date_due->setTimezone('UTC');

        $component->date_due = $date_due;
        $component->save();

        flash('Component created successfully!', 'success');

 		return redirect()->action( 'AssignmentController@show', [ 'section' => $section, 'assignment' => $assignment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Section $section, Assignment $assignment, Component $component)
    {
        
        $this->validate($request, [
        
        'title' => 'required',
        'date_due' => 'date_format:"m-d-y"|required'
        ]);
  
        $date_due = Carbon::createFromFormat('m-d-y', $request->input('date_due'));

        $date_due->hour = 23;
        $date_due->minute = 59;
        $date_due->second = 59;

        // $date_due->toDateTimeString(); 
        // $date_due->setTimezone('UTC');

        $component->date_due = $date_due;
        $component->title = $request->input('title');
        $component->save();

        flash('Component updated successfully!', 'success');

        return redirect()->action( 'AssignmentController@show', [ 'section' => $section, 'assignment' => $assignment]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, Section $section, Assignment $assignment, Component $component)

    {

    return view( 'partials.teacher.component.delete', [ 'section' => $section, 'assignment' => $assignment, 'component' => $component]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Section $section, Assignment $assignment, Component $component)
    {
        
       
        if ($assignment->components->count() >= 2 ) {

        $component->delete();

        //$sectionAssignments = $section->assignments;

        flash('Component deleted successfully!', 'success');

        return redirect()->action('AssignmentController@show')->with(['section' => $section->id, 'assignment' => $assignment->id ]);

        }

        else {

        echo 'Cant delete component';

        }

    }
}
