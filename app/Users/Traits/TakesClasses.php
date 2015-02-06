<?php
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 02/02/15
 * Time: 18:35
 */

use \App\User;



trait TakesClasses {
    /**
     * Returns the classes followed by an user.
     * @access public
     * @relationship many-many
     * @return Class[]
     */
    public function takenClasses(){
        $this->belongsToMany(Course::class ,'classes_users','class','user');
    }
    abstract public function belongsToMany();
}