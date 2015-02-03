<?php
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 02/02/15
 * Time: 17:05
 */


namespace App;


class Student  extends User{
    use \TakesClasses;

    /**
     * Returns the guardians responsible for the minor.
     * @access public
     * @return User(Guardian)[]
     */
    public function guardians(){
        $this->hasMany('User','tutor','tutored');
    }

    /**
     * Returns all the tests taken by the student.
     * @access public
     * @return Test[]
     */
    public function tests(){
        $this->hasMany('Test','test','student');
    }

    /**
     * Returns all the absences of the student.
     * @access public
     * @return Absence[]
     */
    public function absences(){
        $this->hasMany('Absence',null,'absent');
    }
}