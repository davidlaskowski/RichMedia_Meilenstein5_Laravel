<?php namespace Laravel5App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel5App\Models\Grade;
use Laravel5App\Models\Semester;
class Course extends Model {
    
    /* Felder:
    id: int(11)
    title: varchar(255)
    semester_id: int(11)
    created_at: datetime
    updated_at: datetime
    deleted_at: datetime
    */

	public function grades()
    {
        return $this->hasMany('Laravel5App\Models\Grade');
    }

    public function semester()
    {
        return $this->belongsTo('Laravel5App\Models\Semester');
    }
    
	public static $rules = array(
	    'title'=>'required',
        'semester_id' => 'required|numeric|min:1'
    );
}
