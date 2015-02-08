<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model {
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
     * Returns all the classes that exist in that school year.
     * @acces public
     * @relationship one-many
     * @return Class[]
     */
    public function classesOfThisYear(){
        $this->hasMany(Course::class,'schoolyear');
    }

}
