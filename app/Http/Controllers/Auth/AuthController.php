<?php namespace App\Http\Controllers\Auth;

use App\Commands\CreateUserCommand;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Entities\Users\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers as AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Validator;
use Kodeine\Acl\Models\Eloquent\Role;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 *
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'email' => 'required|email', 'password' => 'required',
        ]);
        if($validator->passes()) {
            $credentials = $request->only('email', 'password');
            if ($this->auth->attempt($credentials, $request->has('remember'))) {
                    $this->auth->user()->approved?:Flash::warning('Il tuo account non è ancora stato approvato!<br>
                                                                    Perfavore attendi che qualcuno della segreteria prenda in carico la richiesta.');
                return redirect()->intended($this->redirectPath());
            }
            if(User::onlyTrashed()->where('email','=',$request['email'])->count() ){
                Flash::warning('Questi account non è attivo!<br>
                        Cerca nella tua casella email la mail di registrazione, e clicca \'Attiva\'!');
            }else{
                Flash::error('Questi dati non corrispondono a nessun account!<br>
                        Controlla che i dati immessi siano esatti!');
            }
        }else {
            Flash::warning($validator->errors()->first());
        }
        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'));
    }

    public function getRegister(){
        return view('auth.register')
            ->with('roles',array(
                Role::where('slug','=','student')->first(),
                Role::where('slug','=','extern')->first() ));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(AddUserRequest $request)
    {
        $user = $this->dispatch(new CreateUserCommand($request->all()));
        if($user){
            Flash::info('Controlla la tua email in attesa del messaggio di attivazione.');
            $this->auth->login($user);
        }else {
            Flash::error('Impossibile effetture la registrazione, riprova più tardi.');
        }
        return redirect($this->redirectPath());
    }

}
