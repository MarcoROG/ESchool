<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers as AutheenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Validator;
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

	use AutheenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
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
                return redirect()->intended($this->redirectPath());
            }

            Flash::error('Questi dati non corrispondono a nessun account!');
        }else {
            Flash::warning($validator->errors()->first());
        }
        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $input=$request->all();
        $input['password']='123456789';//TODO: random generated password
        $validator = $this->registrar->validator($input);

        if ($validator->fails())
        {
            Flash::warning($validator->errors()->first());
        }

        $this->auth->login($this->registrar->create($input));

        return redirect($this->redirectPath());
    }

}
