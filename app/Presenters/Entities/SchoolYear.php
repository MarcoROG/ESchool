<?php namespace App\Presenters\Entities;
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 09/04/15
 * Time: 18:39
 */




use App\Presenters\Presenter;

class SchoolYear extends Presenter {

    /**
     * Presents the schoolyear with a nice name (a.s. 2015-2016)
     * @return string
     */
    public function nice_name(){
        return 'Anno scolastico '.$this->first_day_first_semester->year.'-'
        .$this->last_day_second_semester->year;
    }

    /**
     * Presents the first term dates in a readable way
     * @return string
     */
    public function first_term(){
        return $this->first_day_first_semester->day.' '
        .trans('dates.month.'.$this->first_day_first_semester->month).' - '
        .$this->last_day_first_semester->day.' '
        .trans('dates.month.'.$this->last_day_first_semester->month);
    }

    /**
     * Presents the second term dates in a readable way
     * @return string
     */
    public function second_term(){
        return $this->first_day_second_semester->day.' '
        .trans('dates.month.'.$this->first_day_second_semester->month).' - '
        .$this->last_day_second_semester->day.' '
        .trans('dates.month.'.$this->last_day_second_semester->month);
    }
}