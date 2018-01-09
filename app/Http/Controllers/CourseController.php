<?php namespace Laravel5App\Http\Controllers;

use Laravel5App\Models\User;
use Laravel5App\Models\Course;
use Laravel5App\Models\Semester;
use Laravel5App\Models\Grade;
use Validator;
use View;
use Request;
use Hash;
use DB;

class CourseController extends Controller {
	 /**
     * index-Action
     */
     public function getIndex()
     {
        $courses = Course::paginate(20);
        return view('courses.index')->with('courses', $courses);
    }

     /**
     * show-Action
     */
     public function getShow($id = 0)
     {
        $course = Course::find($id);
        return view('courses.show')->with('course', $course);
    }

    /**
     * delete-Action
     */
    public function getDelete($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect('courses/index')->with('message', 'success|Student wurde erfolgreich gelöscht!');
    }

    /**
     * edit-Action (Formularauswertung)
     */
    public function postEdit($id)
    {
        $course = Course::find($id);
        $rules = Course::$rules;

        $validator = Validator::make(Request::all(), $rules);

        if ($validator->passes()) 
        {
            $course->semester_id = Request::input('semester_id');
            $course->title = Request::input('title');

            $course->save();

            return redirect('courses/index')->with('message', 'success|Kurs wurde erfolgreich gespeichert!');
        }
        else{
            return redirect('courses/edit/'.$course->id)->with('message', 'danger|Die folgenden Fehler sind aufgetreten:')->withErrors($validator)->withInput();
        }
    }

    /**
     * edit-Action
     */
    public function getEdit($id = 0)
    {
        $course = Course::find($id);
        $semesters = Semester::orderBy('name', 'DESC')->get();
        foreach($semesters as $semester){
            $semesterArray[$semester->id] = $semester->title;
        }
        return view('courses.edit')->with('course', $course)->with('semesterArray', $semesterArray);
    }

    /**
     * new-Action
     */
    public function getNew()
    {
        $semesters = Semester::orderBy('name', 'DESC')->get();
        $semesterArray[null] = '--- bitte wählen ---';
        foreach($semesters as $semester)
        {
            $semesterArray[$semester->id] = $semester->title;
        }

        return view('courses.new')->with('semesterArray', $semesterArray);
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
       $course = new Course;
       $course->title = Request::input('title');
       $course->semester_id = Request::input('semester_id');
       $course->save();

       return redirect('courses')->with('message', 'success|Kurs erfolgreich angelegt!');
   } 
   else 
   {
        	// validation has failed, display error messages   
       return redirect('courses/new')->with('message', 'danger|Die folgenden Fehler sind aufgetreten:')->withErrors($validator)->withInput();
   }
}

}
