<?php namespace Laravel5App\Http\Controllers;

use Laravel5App\Models\Grade;
use Laravel5App\Models\Course;
use Laravel5App\Models\Semester;
use Laravel5App\Models\User;
use Validator;
use View;
use Request;
use Hash;

class GradeController extends Controller {
    /**
     * index-Action
     */
    public function getIndex()
    {
        $grades = Grade::paginate(20);
        return view('grades.index')->with('grades', $grades);
    }

    /**
     * show-Action
     */
    public function getShow($id = 0)
    {
        $grade = Grade::find($id);
        return view('grades.show')->with('grade', $grade);
    }

    /**
     * delete-Action
     */
    public function getDelete($id)
    {
        $grade = Grade::find($id);
        $grade->delete();
        return redirect('grades/index')->with('message', 'success|Student wurde erfolgreich gelöscht!');
    }

    /**
     * edit-Action
     */
    public function getEdit($id = 0)
    {
        $grade = Grade::find($id);
        $semesters = Semester::orderBy('name', 'DESC')->get();
        $courses = Course::all();
        $courseArray = array();
        $courseArray[0] = '--- bitte wählen ---';
        foreach($semesters as $semester)
        {
            $courseArray[$semester->title] = array();
            foreach($semester->courses as $course)
            {
                $courseArray[$semester->title][$course->id] = $course->title;
            }

        }

        $users = User::orderBy('lastname, firstname', 'ASC')->get();
        $userArray = array();
        $userArray[0] = '--- bitte wählen ---';
        foreach($users as $user)
        {
            $userArray[$user->id] = $user->lastname.', '.$user->firstname;
        }
        return view('grades.edit')->with('grade', $grade)->with("courseArray",$courseArray)->with('userArray',$userArray);
    }

    /**
     * edit-Action (Formularauswertung)
     */
    public function postEdit($id)
    {
        $grade = Grade::find($id);
        $rules = Grade::$rules;

                $validator = Validator::make(Request::all(), $rules);
 
        if ($validator->passes()) 
        {
        $grade->semester_id = Request::input('semester_id');
        $grade->user_id = Request::input('user_id');
            $grade->grade = Request::input('grade');

            $grade->save();
         
            return redirect('grades/index')->with('message', 'success|Note wurde erfolgreich gespeichert!');
        }
        else{
            return redirect('grades/edit/'.$user->id)->with('message', 'danger|Die folgenden Fehler sind aufgetreten:')->withErrors($validator)->withInput();
        }
    }

    /**
     * new-Action
     */
    public function getNew()
    {
    	$semesters = Semester::orderBy('name', 'DESC')->get();
    	$courses = Course::all();
    	$courseArray = array();
    	$courseArray[0] = '--- bitte wählen ---';
    	foreach($semesters as $semester)
    	{
    		$courseArray[$semester->title] = array();
    		foreach($semester->courses as $course)
    		{
    			$courseArray[$semester->title][$course->id] = $course->title;
    		}

    	}
    	$users = User::orderBy('lastname, firstname', 'ASC')->get();
    	$userArray = array();
    	$userArray[0] = '--- bitte wählen ---';
    	foreach($users as $user)
    	{
    		$userArray[$user->id] = $user->lastname.', '.$user->firstname;
    	}

    	$gradeArray = array('1.0'=>'1.0', '1.3'=>'1.3', '1.7'=>'1.7', '2.0'=>'2.0', '2.3'=>'2.3', '2.7'=>'2.7', '3.0'=>'3.0', '3.3'=>'3.3', '3.7'=>'3.7', '4.0'=>'4.0', '5.0'=>'5.0');
    	

        return view('grades.new')->with('courseArray', $courseArray)->with('userArray', $userArray)->with('gradeArray', $gradeArray);
    }

    /**
     * new-Action (Formularauswertung)
     */
    public function postNew()
    {
		$validator = Validator::make(Request::all(), Grade::$rules);
 
    	if ($validator->passes()) 
    	{
        	// validation has passed, save user in DB
        	$grade = new Grade;
		    $grade->user_id = Request::input('user_id');
		    $grade->course_id = Request::input('course_id');
		    $grade->grade = Request::input('grade');
		    $grade->save();
		 
		    return redirect('grades')->with('message', 'success|Note erfolgreich angelegt!');
    	} 
    	else 
    	{
        	// validation has failed, display error messages   
        	return redirect('grades/new')->with('message', 'danger|Die folgenden Fehler sind aufgetreten:')->withErrors($validator)->withInput();
    	}
    }

}
