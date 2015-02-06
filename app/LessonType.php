<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonType extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lesson_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * All the lessons of a specific type.
     * @access public
     * @relationship one-many
     * @return Lesson[]
     */
    public function lessonsOfType(){
        $this->hasMany(Lesson::class,'type');
    }
}
