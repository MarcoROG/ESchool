<?php
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 11/02/15
 * Time: 15:49
 */
use \App;
trait MakesConferences {
    /**
     * Returns the conferences followed by an user.
     * @access public
     * @relationship one-many
     * @return Conferences[]
     */
    public function takenClasses(){
        return $this->hasMany(App\Conference::class ,strtolower(get_class($this)));
    }
    abstract public function hasMany();
}