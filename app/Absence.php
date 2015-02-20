<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'absences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['absent','tutor','reason','accepted'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The guardian who justified this absence.
     * @access public
     * @relationship many-one
     * @return Guardian
     */
    public function justifier(){
        return $this->belongsTo(Guardian::class,'tutor');
    }

    /**
     * The student who missed the lessons.
     * @access public
     * @relationship many-one
     * @return Student
     */
    public function absent(){
        return $this->belongsTo(Student::class,'absent');
    }

    /**
     * The lessons missed by the student.
     * @access public
     * @relationship many-many
     * @return Lesson[]
     */
    public function missedLessons(){
        return $this->belongsToMany(Lesson::class,'absences_lessons','absence','lesson');
    }
}
