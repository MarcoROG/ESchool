<?php namespace App\Repositories\Eloquent;
/**
 * Created by PhpStorm.
 * User: marcobellan
 * Date: 09/04/15
 * Time: 16:27
 */

use App\Entities\SchoolYear;
use App\Repositories\Contracts\IGenericCRUD;
use App\Repositories\Contracts\ISchoolYearRepository;
use Carbon\Carbon;
use Vinkla\Hashids\Facades\Hashids;

class SchoolYearRepository implements IGenericCRUD,ISchoolYearRepository {
    /**
     * Returns the specified schoolyear
     * @param $identifier
     * @param bool $hash
     * @return mixed
     */
    public function find($identifier,$hash=true){
        if($hash){
            return SchoolYear::find(Hashids::decode($identifier)[0]);
        }
        return SchoolYear::find($identifier);
    }

    /**
     * Creates an array with the given data
     * @param array $data
     * @return static
     */
    public function create(array $data){
        return SchoolYear::create($data);
    }

    /**
     * Updates the specified schoolyear with the specified data
     * @param $hash
     * @param array $data
     * @return mixed
     */
    public function update($hash,array $data){
        $year=$this->find($hash);
        $year->fill($data);
        return $year->save();
    }

    /**
     * Deletes the specified schoolyear
     * @param $hash
     * @return mixed
     */
    public function delete($hash){
        return $this->find($hash)->delete();
    }

    /**
     * Returns all the schoolyears begun after the specified date
     * @param $date
     * @return mixed
     */
    public function after($date){
        return SchoolYear::where('first_day_first_semester','>',$date->toDateTimeString());
    }

    /**
     * Returns all the schoolyears ended before a specified
     * @param $date
     * @return mixed
     */
    public function before($date){
        return SchoolYear::where('last_day_second_semester','<',$date->toDateTimeString());
    }

    /**
     * Returns the current schoolyear
     * @return mixed
     */
    public function current(){
        $date=Carbon::now()->toDateTimeString();
        return SchoolYear::where('first_day_first_semester','<',$date)
            ->where('last_day_second_semester','>',$date);
    }
}