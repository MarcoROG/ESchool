<?php namespace App\Presenters\Entities;
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 28/03/15
 * Time: 17:44
 */




use App\Presenters\Presenter;

class User extends Presenter {
    /**
     * Returns the full name of the user
     * @return string
     */
    public function full_name(){
        $full=$this->name. ' ';
        if($this->middle_name)$full.=$this->middle_name . ' ';
        $full.=$this->surname;
        return $full;
    }
    /**
     * Returns the day in which the user was born
     * @return Carbon
     */
    public function birthday(){
        return $this->birth_day->format('d/m/Y');
    }

    /**
     * Returns the birthday of the user
     * @return string
     */
    public function recurrent_birthday(){
        return $this->birth_day->day.' '
        .strtolower(trans('dates.month.'.$this->birth_day->month));
    }
}