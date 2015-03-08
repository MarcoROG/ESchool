<?php namespace App\Http\Controllers;

use App\Commands\CreateUserCommand;
use App\Http\Requests;
use App\Http\Requests\AddUserRequest;
use App\Users\User;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers as AuthenticatesAndRegistersUsers;
use Kodeine\Acl\Models\Eloquent\Role;
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
        $request['verified']=true;
        if($this->dispatch(new CreateUserCommand($request->all()))){
            Flash::success('Utente registrato correttamente.');
        }else {
            Flash::error('Errore durante la creazione dell\'utente.');
        }
        return redirect(url('users/add'));
    }


    /**
     * Shows to secretaries the interface for registering an user
     * @return \Illuminate\View\View
     */
    public function showSubscriptionInterface(){
        return view('users.add')
            ->with('roles',Role::all())
            ->with('mode','secretary');
    }

    /**
     * Shows all the info for an user
     * @param $id
     */
    public function showUser($id){

    }

    /**
     * Validates an user using his token
     * @param $token
     */
    public static function verifyUser($token){
        $user=User::onlyTrashed()->where('verify_token',$token)->first();
        if($user){
            $user->restore();
            if(!Auth::user()) Auth::login($user);
            Flash::success('Verifica account avvenuta con successo!');
            return redirect(url('home'));
        }
        Flash::error('Impossibile attivare l\'account specificato.');
        return redirect(url('landing'));
    }
}
