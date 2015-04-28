<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Carbon\Carbon;

class EditUserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        return (Auth::user()->can('edit.users')||Auth::user()->id==$this['id']);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        return [
            'name' => 'required|string|max:30',
            'middle_name' => 'string|max:30',
            'surname' => 'required|string|max:30',
            'birth_day' => 'required|date_format:"d/m/Y"|before:'.Carbon::create()->toAtomString(),
            'birth_place'=>'required|string|max:255',
            'gender'=>'required|string|max:1',
            'address'=>'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|alpha_num|max:255',
            'mobile'=> 'alpha_num|max:255',
            'password'=>'sometimes|confirmed|min:6|max:255'
        ];
	}

}
