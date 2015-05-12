<?php namespace App\Http\Controllers;

use App\Entities\SchoolYear;
use App\Http\Requests;
use App\Http\Requests\EditSchoolYearRequest;
use App\Repositories\Contracts\ISchoolYearRepository;
use Laracasts\Flash\Flash;


class SchoolYearsController extends Controller {

    protected $schoolyears;
    function __construct(ISchoolYearRepository $r)
    {
        $this->schoolyears=$r;
    }

    /**
     * Returns all the schoolyears
     * @return $this
     */
    public function getAll()
    {
        return view('schoolyears.all')->with('years',SchoolYear::all());
	}

    public function getCurrent()
    {

    }

    public function create()
    {

    }

    public function getInsertionInterface()
    {

    }

    /**
     * Returns the specified schoolyear
     * @param $hash
     * @return $this
     */
    public function get($hash)
    {
        return view('schoolyears.year')->with('y',$this->schoolyears->find($hash));
    }

    public function getEdit($hash){
        return view('schoolyears.edit')->with('year',$this->schoolyears->find($hash));
    }

    public function edit($hash, EditSchoolYearRequest $request){
        $data=$request->except('_token','_method','action');
        $this->schoolyears->update($hash,$data);
        Flash::success('Anno scolastico modificato correttamente');
        return redirect('schoolyears/'. $hash);
    }
}
