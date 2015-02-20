<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','type'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The type of the test.
     * @access public
     * @relationship many-one
     * @return TestType
     */
    public function type(){
        return $this->belongsTo(TestType::class,'type');
    }

    /**
     * All the students that took a specific test.
     * @access public
     * @relationship many-many
     * @return Student[]
     */
    public function evaluatedStudents(){
        return $this->belongsToMany(Student::class,'tests_users','test','student');
    }

    /**
     * All the topics required in a specific test.
     * @access public
     * @relationship many-many
     * @return Topic[]
     */
    public function evaluatedTopics(){
        return $this->belongsToMany(Topic::class,'tests_topics','test','topic');
    }

    /**
     * Lessons in which the test takes place.
     * @access public
     * @relationship one-many
     * @return Lesson[]
     */
    public function conductedInLessons(){
        return $this->hasMany(Lesson::class,'test');
    }
}
