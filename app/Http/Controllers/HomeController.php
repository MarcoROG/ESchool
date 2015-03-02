<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller {
    function __construct()
    {
        $this->middleware('guest', ['except' => 'authenticatedIndex']);
    }

    public function index(){
        return View('landing');
	}

    public function authenticatedIndex()
    {
        return View('home');
    }
}
