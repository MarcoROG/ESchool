<?php
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 09/04/15
 * Time: 16:17
 */

namespace App\Repositories\Contracts;


interface ISchoolYearRepository {
    /**
     * Returns all the schoolyears ended before the specified date
     * @param $date
     * @return mixed
     */
    public function before($date);


    /**
     * Returns all the schoolyears began after the specified date
     * @param $date
     * @return mixed
     */
    public function after($date);

    /**
     * Returns the current schoolyear
     * @return mixed
     */
    public function current();
}