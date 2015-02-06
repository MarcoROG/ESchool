<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classrooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['floor','number','name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * All the lessons held in a specific classroom
     * @access public
     * @relationship one-many
     * @return Lesson[]
     */
    public function lessonsHeldHere(){
        $this->hasMany(Lesson::class,'classroom');
    }
}
