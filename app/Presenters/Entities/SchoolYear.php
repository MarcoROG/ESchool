<?php namespace App\Presenters\Entities;
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 09/04/15
 * Time: 18:39
 */




use App\Presenters\Presenter;

class SchoolYear extends Presenter {
    public function nice_name(){
        return 'Anno scolastico '.$this->first_day_first_semester->year.'-'
        .$this->last_day_second_semester->year;
    }
}