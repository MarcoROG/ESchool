<?php namespace App\Entities;

use App\Entities\Users\Teacher;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subjects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * Topics which belong to a specific subject.
     * @access public
     * @relationship one-many
     * @return Topic[]
     */
    public function relatedTopics(){
        return $this->hasMany(Topic::class,'subject');
    }

    /**
     * All the classes which have this subject in their studies plan.
     * @access public
     * @relationship many-many
     * @return Course[]
     */
    public function studyingClasses(){
        return $this->belongsToMany(Course::class,'classes_users','subject','class');
    }
    /**
     * All the teachers which teach this subject.
     * @access public
     * @relationship many-many
     * @return Teacher[]
     */
    public function qualifiedTeachers(){
        return $this->belongsToMany(Teacher::class,'classes_users','subject','user')->distinct('user');
    }
}
