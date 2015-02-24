<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Users\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    //TODO : access management
    public function showAll(){
        return view('users.all')->with('users',User::all());
	}

    public function register()
    {

    }

    public function showSubscriptionInterface(){
        return view('users.add');
    }

    public function showUser($id){

    }
}
