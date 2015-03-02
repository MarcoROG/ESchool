<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\AddUserRequest;
use App\Users\User;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers as AuthenticatesAndRegistersUsers;
use Laracasts\Flash\Flash;

class UserController extends Controller {
    use AuthenticatesAndRegistersUsers;
    //TODO : access management

    function __construct(Registrar $reg)
    {
        $this->registrar=$reg;
    }

    /**
     * Shows all the users, better to use when queried
     * @return $this
     */
    public function showAll(){
        return view('users.all')->with('users',User::all());
	}

    /**
     * Registers an user without logging him in. Action performed by a secretary
     * @param AddUserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(AddUserRequest $request){
        if($this->registrar->create($request->all())instanceof User) {
            Flash::success('Utente creato correttamente.');
        } else {
            Flash::error('Impossibile creare l\'utente.');
        }
        return redirect(url('users/add'));
    }


    /**
     * Shows to secretaries the interface for registering an user
     * @return \Illuminate\View\View
     */
    public function showSubscriptionInterface(){
        return view('users.add');
    }

    /**
     * Shows all the info for an user
     * @param $id
     */
    public function showUser($id){

    }
}
