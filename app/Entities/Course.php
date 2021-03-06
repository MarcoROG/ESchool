<?php namespace App\Entities;

use App\Entities\Users\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model {
    use SoftDeletes
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
        return $this->belongsTo(SchoolYear::class,'schoolyear');
    }

    /**
     * All the planned topics the class is going to tackle during the year.
     * @access public
     * @relationship one-many
     * @return Topic[]
     */
    public function tackledTopics(){
        return $this->hasMany(Topic::class,'class');
    }

    /**
     * All the people(teachers and students) composing a class.
     * @access public
     * @relationship many-many
     * @return User[](Student|Teacher)
     */
    public function members(){
        return $this->belongsToMany(User::class,'classes_users','class','user');
    }

    /**
     * All the lessons a class will attend during the year.
     * @access public
     * @relationship many-many
     * @return Lesson[]
     */
    public function lessons(){
        return $this->belongsToMany(Lesson::class,'classes_lessons','class','lesson');
    }


}
