<?php namespace Laravel5App\Http\Controllers;

use Laravel5App\Models\Grade;
use Laravel5App\Models\Course;
use Laravel5App\Models\User;
use Laravel5App\Models\Semester;
use Validator;
use View;
use Request;
use Hash;

class SemesterController extends Controller {
	/**
     * index-Action
     */
    public function getIndex()
    {
        $semesters = Semester::paginate(20);
        return view('semesters.index')->with('semesters', $semesters);
    }

    /**
     * show-Action
     */
    public function getShow($id = 0)
    {
        $semester = Semester::find($id);
        return view('semesters.show')->with('semester', $semester);
    }

       /**
     * delete-Action
     */
    public function getDelete($id)
    {
        $semester = Semester::find($id);
        $semester->delete();
        return redirect('semesters/index')->with('message', 'success|Student wurde erfolgreich gelöscht!');
    }

/**
     * edit-Action (Formularauswertung)
     */
    public function postEdit($id)
    {
        $semester = Semester::find($id);
        $rules = Semester::$rules;

                $validator = Validator::make(Request::all(), $rules);
 
        if ($validator->passes()) 
        {
        $semester->title = Request::input('title');
        $semester->startdate = Request::input('startdate');

            $semester->save();
         
            return redirect('semesters/index')->with('message', 'success|Kurs wurde erfolgreich gespeichert!');
        }
        else{
            return redirect('semesters/edit/'.$semester->id)->with('message', 'danger|Die folgenden Fehler sind aufgetreten:')->withErrors($validator)->withInput();
        }
    }

    /**
     * edit-Action
     */
    public function getEdit($id = 0)
    {
        $semester = Semester::find($id);
        return view('semesters.edit')->with('semester', $semester);
    }

     /**
     * new-Action
     */
    public function getNew()
    {
        return view('semesters.new');
    }

    /**
     * new-Action (Formularauswertung)
     */
    public function postNew()
    {
		$validator = Validator::make(Request::all(), Course::$rules);
 
    	if ($validator->passes()) 
    	{
        	// validation has passed, save user in DB
        	$semester = new Semester;
		    $semester->title = Request::input('title');
            $semester->startdate = Request::input('startdate');
		    $semester->save();
		 
		    return redirect('semesters')->with('message', 'success|Semester erfolgreich angelegt!');
    	} 
    	else 
    	{
        	// validation has failed, display error messages   
        	return redirect('semesters/new')->with('message', 'danger|Die folgenden Fehler sind aufgetreten:')->withErrors($validator)->withInput();
    	}
    }

}
