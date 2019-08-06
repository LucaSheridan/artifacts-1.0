<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use App\Component;
use App\Section;
use Carbon\Carbon;


class AssignmentController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
       $assignments = Assignment::with('site','section','course','components')->get();

       //dd($assignments);

       return view('assignment.index')->with('assignments', $assignments);
    }

    /**
     * Show the form for creating a new assignment.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Section $section)
    {

       return view('partials.teacher.assignment.create')->with('section', $section);
    }

    /**
     * Save a newly created Assignment to the Database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Section $section)
    {

        //dd($request);

        //validate form
        $this->validate($request, [
        
        'title' => 'required',
        'is_complex' => 'required',
        //'date_due' => 'nullable|date_format:"m-d-y"'
        ]);

        //set and persist assignment information to database

        //dd($request->input('date_due'));

        $assignment = New Assignment;
        $assignment->title = $request->input('title');
        $assignment->description = $request->input('description');
        $assignment->section_id = $section->id;
        $assignment->site_id = $section->site_id;
        $assignment->course_id = NULL;
        $assignment->is_active = true;
        $assignment->is_complex = $request->input('is_complex');
        $assignment->save();

        //create a single component for a simple assignments 
        if ($assignment->is_complex != true ){

            $component = New Component;
            $component->title = 'Final '.$request->input('title');
            $component->assignment_id = $assignment->id;
           
            //check if due date is set for simple component 

                if (is_null($request->input('date_due')))

                    {
                    //dd($date_due);

                    $component->save();
                    }
            
                else {

                     $date_due = Carbon::createFromFormat('m-d-y', $request->input('date_due'));

                     //set component time due
                     $date_due->hour = 23;
                     $date_due->minute = 59;
                     $date_due->second = 59;

                     //dd($date_due);

                     //persisit component
                     $component->date_due = $date_due;
                     $component->save();

                     };
        
             }
        
        else {

        $component1 = New Component;
        $component1->title = "Step 1";
        $component1->assignment_id = $assignment->id; 
        $component1->save();            

        $component2 = New Component;
        $component2->title = "Step 2";
        $component2->assignment_id = $assignment->id; 
        $component2->save(); 

        $component3 = New Component;
        $component3->title = "Step 3";
        $component3->assignment_id = $assignment->id; 
        $component3->save(); 

        };

        //$assignment = Assignment::findOrFail($assignment->id)->with('components');

        flash('Assignment created successfully!', 'success');

        return redirect()->action( 'SectionController@show', $section->id);

        return view('/home');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section, Assignment $assignment)
    {
        $sectionAssignments = Assignment::where('section_id', $section->id)->get();

        //dd($sectionAssignments);

        // $assignment = Assignment::with(['components' => function ($query) use ($assignment) {
        //               $query->where('assignment_id', $assignment->id)->orderBy('date_due');
        //               }])->findOrfail($assignment->id);
        
        //dd($assignment);
        //dd($section);
        
        // $checklist = DB::table('components')->leftjoin('artifacts', function ($join) use ($assignment) {

        //                 $join->on('components.id', '=', 'artifacts.component_id');            
                        
        //                 })

        //                 ->where('components.assignment_id', '=', $assignment->id)
        //                 ->orderBy('components.date_due', 'ASC')
        //                 ->select(
        //                  'artifacts.id AS artifactID',
        //                  'components.assignment_id AS assignmentID',
        //                  'components.id AS componentID', 
        //                  'components.title AS componentTitle',
        //                  'components.date_due AS componentDateDue',
        //                  'artifacts.artifact_thumb AS artifactThumb',
        //                  'artifacts.artifact_path AS artifactPath',
        //                  'artifacts.created_at AS artifactCreatedAt')->get();                         

        //                 dd($checklist);

        return view('partials.teacher.assignment.show')->with(['sectionAssignments' => $sectionAssignments,'activeAssignment' => $assignment, 'activeSection' => $section ]);
                                 //$assignment
                                 // 'artifacts' => $artifacts,
                                 //'students' => $students,
                                 //'checklist' => $checklist
                                 //'student_checklist' => $student_checklist
        }

}
