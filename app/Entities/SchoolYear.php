<?php namespace App\Entities;

use App\Presenters\Presentable;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model {
    use Presentable;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'school_years';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_day_first_semester','last_day_first_semester',
        'first_day_second_semester','last_day_second_semester'];

    /**
     * Dates to be treated as a Carbon instance
     *
     * @var array
     */
    protected $dates = ['first_day_first_semester','last_day_first_semester',
        'first_day_second_semester','last_day_second_semester'];

    protected $presenter = \App\Presenters\Entities\SchoolYear::class;

    /**
     * Returns all the classes that exist in that school year.
     * @access public
     * @relationship one-many
     * @return Course[]
     */
    public function classesOfThisYear(){
        return $this->hasMany(Course::class,'schoolyear');
    }

}
