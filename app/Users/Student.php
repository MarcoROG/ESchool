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
     * @relationship many-many
     * @return Guardian[]
     */
    public function guardians(){
        $this->belongsToMany(Guardian::class, 'tutors','tutored','tutor');
    }

    /**
     * Returns all the tests taken by the student.
     * @access public
     * @relationship many-many
     * @return Test[]
     */
    public function takenTests(){
        $this->belongsToMany(Test::class,'tests_users','student','test');
    }

    /**
     * Returns all the absences of the student.
     * @access public
     * @relationship one-many
     * @return Absence[]
     */
    public function absences(){
        $this->hasMany(Absence::class,'absent');
    }
}