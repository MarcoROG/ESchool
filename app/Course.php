<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','academic_year','section','open','year_id'];

    /**
     * The year in which the class takes place.
     * @access public
     * @relationship many-one
     * @return SchoolYear
     */
    public function year(){
        $this->belongsTo(SchoolYear::class,'schoolyear');
    }

    /**
     * All the planned topics the class is going to tackle during the year.
     * @access public
     * @relationship one-many
     * @return Topic[]
     */
    public function tackledTopics(){
        $this->hasMany(Topic::class,'class');
    }

    /**
     * All the people(teachers and students) composing a class.
     * @access public
     * @relationship many-many
     * @return User[](Student|Teacher)
     */
    public function members(){
        $this->belongsToMany(User::class,'classes_users','class','user');
    }

    /**
     * All the lessons a class will attend during the year.
     * @access public
     * @relationship many-many
     * @return Lesson[]
     */
    public function lessons(){
        $this->belongsToMany(Lesson::class,'classes_lessons','class','lesson');
    }
}
