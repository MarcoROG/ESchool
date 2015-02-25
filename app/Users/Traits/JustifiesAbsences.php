<?php
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 25/02/15
 * Time: 21:00
 */

namespace App\Users\Traits;


use App\Absence;

trait JustifiesAbsences {
    /**
     * Returns all the absences justified by the user.
     * @access public
     * @relationship one-many
     * @return Absence[]<
     */
    public function justifiedAbsences(){
        return $this->hasMany(Absence::class,'tutor');
    }
    abstract public function hasMany();
}