<?php namespace App\Http\Controllers;

use App\Commands\CreateUserCommand;
use App\Http\Requests;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Users\User;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers as AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Kodeine\Acl\Models\Eloquent\Role;
use Laracasts\Flash\Flash;

class UserController extends Controller {
    use AuthenticatesAndRegistersUsers;
    //TODO : access management

    function __construct(Registrar $reg)
    {
        $this->middleware('auth');
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
            ->with('roles',Role::all())
            ->with('mode','secretary');
    }

    /**
     * Returns the view to edit the user
     * @param $id
     * @return $this
     */
    public function getEditUser($id){
        $user=User::find($id);
        if(!$user){
            Flash::error('Impossibile trovare l\'utente specificato');
            return redirect()->back();
        }
        return view('users.edit')->with('user',$user)
            ->with('mode',Auth::user()->id==$user->id?'auto':'secretary');
    }


    /**
     * Edits an user
     * @param $token
     * @param EditUserRequest $request
     * @return Redirect
     */
    public function editUser($token,EditUserRequest $request){
        $user=User::where('token','=',$token)->first();

        if(!$user){
            Flash::error('Impossibile trovare l\'utente specificato');
            return redirect()->back();
        }
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
     * @param $id
     * @return $this
     */
    public function getUser($id){
        $user = User::findOrFail($id);
        if(!$user['approved'])Flash::warning('Questo utente non è ancora stato approvato!');
        return view('users.user')->with('user', $user);
    }

    /**
     * Validates an user using his token
     * @param $token
     * @return Redirect
     */
    public static function verifyUser($token){
        $user=User::onlyTrashed()->where('token',$token)->first();
        if($user){
            $user->restore();
            if(!Auth::user()) Auth::login($user);
            Flash::success('Verifica account avvenuta con successo!');
            return redirect(url('home'));
        }
        Flash::error('Impossibile attivare l\'account specificato.');
        return redirect(url(''));
    }

    /**
     * Approves an user
     * @param $token
     * @param $value
     * @return Redirect
     */
    public function approveUser($token,$value){
        $user = User::where('token','=',$token)->firstOrFail();
        if($user) {
            if($user->approve($value)) {
                Flash::success('Operazione effettuata con successo!');
                return redirect(url('users/unapproved'));
            }
        }
        Flash::error('Impossibile attivare l\' utente.');
        return redirect()->back();
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
