<?php

// use App\Artifact;
use App\Assignment;
// use App\Collection;
// use App\Course;
// use App\Post;
use App\Section;
use App\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/single-file', function () {
    return view('partials.single-file');
});



Route::get('/accordion', function () {
    return view('accordion');
});    

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

// Should be only accessible to Master Administrators

// TEACHERS

    // Route::group(['middleware' => ['role:teacher']], function () {

	// Sections
	Route::get('/teacher/section/create', ['middleware' => 'auth', 'uses' => 'SectionController@create']);
	Route::get('/teacher/section/{section}', 'SectionController@show');
	Route::post('/teacher/section', ['middleware' => 'auth', 'uses' => 'SectionController@store']);
	Route::get('/teacher/section/{section}/edit', ['middleware' => 'auth', 'uses' => 'SectionController@edit']);
	Route::patch('/teacher/section/{section}/update', ['middleware' => 'auth', 'uses' => 'SectionController@update']);
	Route::delete('/teacher/section/{section}/delete', 'SectionController@destroy');
	
    // Assignments

	Route::get('/teacher/section/{section}/assignment/create', 'AssignmentController@create');
	Route::post('/teacher/section/{section}/assignment', 'AssignmentController@store');
	Route::get('/teacher/section/{section}/assignment/{assignment}', 'AssignmentController@show');

	// Components

	Route::get('/teacher/section/{section}/assignment/{assignment}/component/create}', 'ComponentController@create');
	Route::post('/teacher/section/{section}/assignment/{assignment}/component', 'ComponentController@store');
	Route::get('/teacher/section/{section}/assignment/{assignment}/component/{component}/edit', 'ComponentController@edit');
	Route::patch('/teacher/section/{section}/assignment/{assignment}/component/{component}/update', 'ComponentController@update');
	Route::get('/teacher/section/{section}/assignment/{assignment}/component/{component}/delete', 'ComponentController@delete');
	Route::delete('/teacher/section/{section}/assignment/{assignment}/component/{component}/delete', 'ComponentController@destroy');


	
