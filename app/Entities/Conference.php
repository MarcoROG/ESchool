<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pt_conferences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['teacher','student','classroom','date','last_proposal','confirmed'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The teacher hosting the pt_conference.
     * @access public
     * @relationship many-one
     * @return Teacher
     */
    public function hostingTeacher(){
        return $this->belongsTo(Teacher::class,'teacher');
    }

    /**
     * The student whose parents are talking with the teacher.
     * @access public
     * @relationship many-one
     * @return Student
     */
    public function involvedStudent(){
        return $this->belongsTo(Student::class,'student');
    }
    /**
     * The classroom in which the pt_conference takes place.
     * @access public
     * @relationship many-one
     * @return Classroom
     */
    public function hostingClassroom(){
        return $this->belongsTo(Classroom::class,'classroom');
    }
}
