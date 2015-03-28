<?php namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'topics';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description','subject','class'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The class tackling this topic.
     * @access public
     * @relationship many-one
     * @return Course
     */
    public function studyingCourse(){
        return $this->belongsTo(Course::class,'class');
    }

    /**
     * The subject this topic is about.
     * @access public
     * @relationship one-many
     * @return Subject
     */
    public function subject(){
        return $this->belongsTo(Subject::class,'subject');
    }

    /**
     * The tests in which this topic is verified.
     * @access public
     * @relationship many-many
     * @return Test[]
     */
    public function relatedTests(){
        return $this->belongsToMany(Test::class,'tests_topics','topic','test');
    }

    /**
     * Lessons in which this topic is explained.
     * @access public
     * @relationship many-many
     * @return Lesson[]
     */
    public function explanationLessons(){
        return $this->belongsToMany(Lesson::class,'lessons_topics','topic','lesson');
    }
}
