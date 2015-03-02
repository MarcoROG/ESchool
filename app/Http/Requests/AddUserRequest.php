<?php namespace App\Http\Requests;

use Carbon\Carbon;
use App\Http\Requests\Request;

class AddUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		//return Auth::user()->can('add.user');
        return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        $this['catholic']=Request::input('catholic')=='on';
        $this['password']='123456789';//TODO: random generated password

        return [
            'name' => 'required|string|max:30',
            'middle_name' => 'string|max:30',
            'surname' => 'required|string|max:30',
            'birth_day' => 'required|date|before:'.Carbon::create()->toAtomString(),
            'birth_place'=>'required|string',
            //'catholic'=>'boolean',
            'gender'=>'required|string|max:1',
            'address'=>'required|string',
            'email' => 'required|email|max:255|unique:users',
            'telephone' => 'required|alpha_num',
            'mobile'=> 'alpha_num',
		];
	}

}
