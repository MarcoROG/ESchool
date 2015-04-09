<?php namespace App\Http\Controllers;

use App\Entities\SchoolYear;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SchoolYearsController extends Controller {

    public function getAll()
    {
        return view('schoolyears.all')->with('years',SchoolYear::all());
	}

    public function getCurrent()
    {

    }

    public static function create()
    {

    }

    public static function getInsertionInterface()
    {

    }

    public static function get($hash)
    {

    }

    public function getEdit($hash){

    }

    public function edit($hash){

    }
}
