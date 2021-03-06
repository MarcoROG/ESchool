<?php namespace App\Entities\Users;
use App\Entities\Users\Traits\TakesClasses;
use App\Entities\Users\Traits\MakesConferences;
use App\Entities\Users\Traits\JustifiesAbsences;
use App\Entities\Absence;
use App\Entities\Test;


/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 02/02/15
 * Time: 17:05
 */




class Student  extends User{
    use TakesClasses , MakesConferences, JustifiesAbsences;

    /**
     * Returns the guardians responsible for the minor.
     * @access public
     * @relationship many-many
     * @return Guardian[]
     */
    public function guardians(){
        return $this->belongsToMany(Guardian::class, 'tutors','tutored','tutor');
    }

    /**
     * Returns all the tests taken by the student.
     * @access public
     * @relationship many-many
     * @return Test[]
     */
    public function takenTests(){
        return $this->belongsToMany(Test::class,'tests_users','student','test');
    }

    /**
     * Returns all the absences of the student.
     * @access public
     * @relationship one-many
     * @return Absence[]
     */
    public function absences(){
        return $this->hasMany(Absence::class,'absent');
    }
}