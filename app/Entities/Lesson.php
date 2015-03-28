<?php namespace App\Entities;

use App\Entities\Users\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model {
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lessons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['time','notes','teacher','classroom','type','test','schooltrip'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The teacher holding the lesson.
     * @access public
     * @relationship many-one
     * @return Teacher
     */
    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher');
    }

    /**
     * The classroom in which the lesson is held.
     * @access public
     * @relationship many-one
     * @return Classroom
     */
    public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom');
    }

    /**
     * The type of the lesson.
     * @access public
     * @relationship many-one
     * @return LessonType
     */
    public function type(){
        return $this->belongsTo(LessonType::class,'type');
    }

    /**
     * All the absences during a lesson.
     * @access public
     * @relationship many-many
     * @return Absence[]
     */
    public function absences(){
        return $this->belongsToMany(Absence::class,'lesson','absence');
    }

    /**
     * All the classes following a lesson.
     * @access public
     * @relationship many-many
     * @return Course[]
     */
    public function followingClasses(){
        return $this->belongsToMany(Course::class,'classes_lessons','lesson','class');
    }

    /**
     * The topics explained during a lesson.
     * @access public
     * @relationship many-many
     * @return Topic[]
     */
    public function explainedTopics(){
        return $this->belongsToMany(Topic::class,'lessons_topics','lesson','topic');
    }

    /**
     * An eventual test planned for that lesson.
     * @access public
     * @relationship many-one
     * @return Test
     */
    public function plannedTest(){
        return $this->belongsTo(Test::class,'test');
    }

    /**
     * An eventual trip planned for that lesson.
     * @access public
     * @relationship many-one
     * @return SchoolTrip
     */
    public function plannedTrip(){
        return $this->belongsTo(SchoolTrip::class,'schooltrip');
    }
}
