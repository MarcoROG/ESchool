<?php namespace App\Http\Controllers;

use App\Commands\CreateUserCommand;
use App\Http\Requests;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Entities\Users\User;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers as AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Kodeine\Acl\Models\Eloquent\Role;
use Laracasts\Flash\Flash;
use Vinkla\Hashids\Facades\Hashids;

class UserController extends Controller {
    use AuthenticatesAndRegistersUsers;


    function __construct(Registrar $reg)
    {
        //$this->middleware('auth');
        $this->registrar=$reg;
    }

    /**
     * Shows all the users, better to use when queried
     * @return $this
     */
    public function getAll(){
        return view('users.all')->with('users',
            User::where('approved','=',true)->get());
	}

    /**
     * Registers an user without logging him in. Action performed by a secretary
     * @param AddUserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(AddUserRequest $request){
        $request['approved']=true;
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
    public function getSubscriptionInterface(){
        return view('users.add')
            ->with('roles',Role::all());
    }

    /**
     * Returns the view to edit the user
     * @param $hash
     * @return $this
     */
    public function getEditUser($hash){
        $user=User::findOrFail(Hashids::decode($hash)[0]);
        return view('users.edit')->with('user',$user)
            ->with('mode',Auth::user()->id==$user->id?'auto':'secretary');
    }


    /**
     * Edits an user
     * @param $hash
     * @param EditUserRequest $request
     * @return Redirect
     */
    public function editUser($hash,EditUserRequest $request){
        $user=User::findOrFail(Hashids::decode($hash)[0]);

        $data=$request->except('password','_token','_method','action');
        $data['catholic']=isset($request['catholic']);
        $user->fill($data);
        if($request->has('password')){
            $user->password=$request['password'];
        }
        $user->save();
        return redirect('users/'.$user->id.'/profile');
    }

    /**
     * Shows all the info for an user
     * @param $hash
     * @return $this
     */
    public function getUser($hash){
        $user = User::findOrFail(Hashids::decode($hash)[0]);
        if(!$user['approved'])Flash::warning('Questo utente non è ancora stato approvato!');
        return view('users.user')->with('user', $user);
    }

    /**
     * Validates an user using his token
     * @param $hash
     * @return Redirect
     */
    public static function verifyUser($hash){
        $user=User::findOrFail(Hashids::decode($hash)[0]);
        $user->restore();
        if(!Auth::user()) Auth::login($user);
        Flash::success('Verifica account avvenuta con successo!');
        return redirect(url('home'));
    }

    /**
     * Approves an user
     * @param $hash
     * @param $value
     * @return Redirect
     */
    public function approveUser($hash,$value){
        $user=User::findOrFail(Hashids::decode($hash)[0]);
        if($user->approve($value)) {
            Flash::success('Operazione effettuata con successo!');
            return redirect(url('users/unapproved'));
        }
    }

    /**
     * Shows all the users that need to be approved
     * @return $this
     */
    public function getUnapproved(){
        return view('users.approve')->with('users',
            User::where('approved','=',false)->get());
    }
}
