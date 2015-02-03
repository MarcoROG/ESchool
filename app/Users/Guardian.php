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
     * @return User(Student)[]
     */
    public function minors(){
        $this->hasMany('User','tutored','tutor');
    }

    /**
     * Returns all the absences justified by the guardian.
     * @access public
     * @return Absence[]
     */
    public function justifiedAbsences(){
        $this->hasMany('Absence',null,'tutor');
    }
}