<?php
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 02/02/15
 * Time: 17:15
 */

namespace App;


class Guardian extends User {


    /**
     * Returns the minors under the responsibility of the guardian.
     * @access public
     * @relationship many-many
     * @return User(Student)[]
     */
    public function minors(){
        $this->hasMany('User','tutors','tutor','tutored');
    }

    /**
     * Returns all the absences justified by the guardian.
     * @access public
     * @relationship one-many
     * @return Absence[]
     */
    public function justifiedAbsences(){
        $this->hasMany('Absence','tutor');
    }
}