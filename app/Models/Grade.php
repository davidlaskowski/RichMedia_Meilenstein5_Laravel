<?php namespace Laravel5App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model {

    /* Felder:
    id: int(11)
    grade: int(11)
    user_id: int(11)
    course_id: int(11)
    created_at: datetime
    updated_at: datetime
    deleted_at: datetime
    */


	public function user()
    {
        return $this->belongsTo('Laravel5App\Models\User');
    }

    public function course()
    {
        return $this->belongsTo('Laravel5App\Models\Course');
    }

    public function semester()
    {
        return $this->belongsTo('Laravel5App\Models\Semester');
    }

    public static function allGradesAsArray(){
        return array('1.0'=>'1.0', '1.3'=>'1.3', '1.7'=>'1.7', '2.0'=>'2.0', '2.3'=>'2.3', '2.7'=>'2.7', '3.0'=>'3.0', '3.3'=>'3.3', '3.7'=>'3.7', '4.0'=>'4.0', '5.0'=>'5.0');
    }

   	public static $rules = array(
	    'user_id'=>'required|numeric|min:1',
	    'course_id'=>'required|numeric|min:1',
	    'grade'=>'required'
    );

}
