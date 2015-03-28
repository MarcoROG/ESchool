<?php
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 02/02/15
 * Time: 17:15
 */

namespace App\Entities\Users;


use App\Entities\SchoolTrip;
use App\Entities\Users\Traits\JustifiesAbsences;

class Guardian extends User {
    use JustifiesAbsences

    /**
     * Returns the minors under the responsibility of the guardian.
     * @access public
     * @relationship many-many
     * @return User(Student)[]
     */
    public function tutoredMinors(){
        return $this->belongsToMany(Student::class,'tutors','tutor','tutored');
    }

    /**
     * All the schooltrips authorized by the guardian.
     * @access public
     * @relationship many-many
     * @return SchoolTrip[]
     */
    public function authorizedTrips(){
        return $this->belongsToMany(SchoolTrip::class,'schooltrips_users','tutor','schooltrip');
    }
}