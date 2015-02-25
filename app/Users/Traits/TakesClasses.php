<?php namespace App\Users\Traits;
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 02/02/15
 * Time: 18:35
 */

use \App\Users;



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