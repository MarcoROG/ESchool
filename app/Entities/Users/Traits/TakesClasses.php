<?php namespace App\Entities\Users\Traits;
use App\Entities\Course;

/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 02/02/15
 * Time: 18:35
 */





trait TakesClasses {
    /**
     * Returns the classes followed by an user.
     * @access public
     * @relationship many-many
     * @return Class[]
     */
    public function takenClasses(){
        return $this->belongsToMany(Course::class ,'classes_users','class','user');
    }
    abstract public function belongsToMany();
}