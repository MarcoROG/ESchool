<?php namespace App\Services;

use App\Users\User;
use Carbon\Carbon;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|string|max:30',
            'middle_name' => 'string|max:30',
            'surname' => 'required|string|max:30',
            'birth_day' => 'required|date|before:'.Carbon::create()->toAtomString(),
            'birth_place'=>'required|string',
            'catholic'=>'boolean',
            'gender'=>'required|string|max:1',
            'address'=>'required|string',
			'email' => 'required|email|max:255|unique:users',
            'telephone' => 'required|alpha_num',
            'mobile'=> 'alpha_num',
			'password' => 'required|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
            'middle_name' => $data['middle_name'],
            'surname' => $data['surname'],
            'birth_day' => $data['birth_day'],
            'birth_place'=>$data['birth_place'],
            'catholic'=>isset($data['catholic']),
            'gender'=>$data['gender'],
            'address'=>$data['address'],
            'telephone' => $data['telephone'],
            'mobile'=> $data['mobile'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

}
