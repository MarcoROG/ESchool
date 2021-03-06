<?php namespace App\Entities\Users\Traits;
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 11/02/15
 * Time: 15:49
 */
use App\Entities\Conference;
trait MakesConferences {
    /**
     * Returns the conferences followed by an user.
     * @access public
     * @relationship one-many
     * @return Conferences[]
     */
    public function takenClasses(){
        return $this->hasMany(Conference::class ,strtolower(get_class($this)));
    }
    abstract public function hasMany();
}