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
     * @param
     * @return mixed
     */
    public function classes(){
        $this->hasMany('Class','classes_users','user','class');
    }
    abstract public function hasMany();
}