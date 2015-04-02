<?php namespace App\Http\Controllers;

use App\Commands\CreateUserCommand;
use App\Http\Requests;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Entities\Users\User;
use App\Repositories\Contracts\IUserRepository;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers as AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Kodeine\Acl\Models\Eloquent\Role;
use Laracasts\Flash\Flash;
use Vinkla\Hashids\Facades\Hashids;

class UserController extends Controller {
    use AuthenticatesAndRegistersUsers;

    protected $users;

    function __construct(Registrar $reg,IUserRepository $u)
    {
        //$this->middleware('auth');
        $this->registrar=$reg;
        $this->users=$u;
    }

    /**
     * Shows all the users, better to use when queried
     * @return $this
     */
    public function getAll(){
        return view('users.all')->with('users',
            $this->users->allApproved());
	}

    /**
     * Registers an user without logging him in. Action performed by a secretary
     * @param AddUserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(AddUserRequest $request){
        $request['approved']=true;
        if($this->dispatch(new CreateUserCommand($request->all(),$this->users))){
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
    public function getEdit($hash){
        if(Auth::user()->id==Hashids::decode($hash)[0]||Auth::user()->can('edit.users')){
        $user=$this->users->find($hash);
        return view('users.edit')->with('user',$user)
            ->with('mode',Auth::user()->id==$user->id?'auto':'secretary');
        }
        return redirect()->back();
    }


    /**
     * Edits an user
     * @param $hash
     * @param EditUserRequest $request
     * @return Redirect
     */
    public function edit($hash,EditUserRequest $request){
        $data=$request->except('_token','_method','action');
        $this->users->update($hash,$data);
        return redirect('users/'. $hash .'/profile');
    }

    /**
     * Shows all the info for an user
     * @param $hash
     * @return $this
     */
    public function getProfile($hash){
        $user = $this->users->find($hash);
        if(!$user['approved'])Flash::warning('Questo utente non è ancora stato approvato!');
        return view('users.user')->with('user', $user);
    }

    /**
     * Validates an user by email
     * @param $hash
     * @return Redirect
     */
    public function verify($hash){
        $this->users->verifyAndAuth($hash);
        Flash::success('Verifica account avvenuta con successo!');
        return redirect(url('home'));
    }

    /**
     * Approves an user
     * @param $hash
     * @param $value
     * @return Redirect
     */
    public function approve($hash,$value){
        if($this->users->approve($hash,$value)) {
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
            $this->users->allUnapproved());
    }
}
