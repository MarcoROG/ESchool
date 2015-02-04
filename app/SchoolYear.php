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
    protected $fillable = ['first_day','last_day'];


    /**
     * Returns all the classes that exist in that school year.
     * @acces public
     * @relationship one-many
     * @return Class[]
     */
    public function classes(){
        $this->hasMany('Course','schoolyear');
    }

}
