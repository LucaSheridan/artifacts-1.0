<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Assignment;
//use App\Component;
//use App\Artifact;
use App\Assignment;
use App\Section;
use App\User;
use Auth;
//use Illuminate\Support\Facades\DB;


class SectionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $sections = Section::with('teachers','students','assignments')->get();

        //dd($sections);

        return view('section.index')->with('sections', $sections);
    }
     
     /**
     * Display the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        // $activeSection = Section::where('id', $section->id)->first();
        
        $activeSection = Section::with('students','teachers','assignments','course')->where('id', $section->id)->first(); 

        $sectionAssignments = Assignment::with('components')->where('section_id', $section->id)->orderBy('id','asc')->get(); 
        
        // $roster = User::whereHas('roles', function ($query) { 
        // $query->where('name', 'like', 'student');
        //     })->whereHas('sections', function ( $query ) use($section) {
        // $query->where('id', $section->id );
        // })->orderBy('lastName','asc')->get();
        //dd($assignments);

        return view('partials.teacher.section.show', compact('activeSection','sectionAssignments'));
    }

    /**
     * Show the form for creating a new section.
     *
     * @return \Illuminate\Http\Response
     */
        public function create()
    {
        
        $sites = Auth::User()->sites()->orderBy('id','asc')->get();

        return view('partials.teacher.section.create')->with('sites', $sites);
    }
    
    /**
     * Store a newly created section to the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);

        $this->validate($request, [
        
            'title' => 'required',
            // 'label' => 'required',
            'site' => 'required',

            ]);

            $section = New Section;
            $section->title = $request->input('title');
            $section->course_id = NULL;
            //$section->label = $request->input('label');
            $section->registrationCode = $string = str_random(8);
            $section->is_active = true;
            $section->is_open = true;
            $section->site_id = $request->input('site');
            $section->save();
            $section->users()->attach(Auth::User()->id);
            $section->save();

            flash('New class created successfully!')->success();

            return redirect()->action('SectionController@show', $section->id);
     }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //dd($section);
        return view('partials.teacher.section.edit')->with('section', $section);;
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        // create valiadator
        $this->validate($request, [
        'title' => 'required'
        // 'label' => 'required',

        ]);

        // get form input data
        $section->title = $request->input('title');
        //$section->label = $request->input('label');
        $section->save();

        flash('Section updated successfully!', 'success');

        return redirect()->action('SectionController@show', $section->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
       public function delete(Section $section)

    {
       return view('partials.teacher.section.delete')->with('section', $section);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
       public function destroy(Section $section)
    {

       $section->delete();

       flash('Section deleted successfully!', 'success');

       return view('home');

    }    
}

