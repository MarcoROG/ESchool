<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class EditSchoolYearRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::user()->can('edit.schoolyears');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'first_day_first_semester' => 'required|date_format:"d/m/Y"',
            'last_day_first_semester' => 'required|date_format:"d/m/Y"',
            'first_day_second_semester' => 'required|date_format:"d/m/Y"',
            'last_day_second_semester' => 'required|date_format:"d/m/Y"',
		];
	}

}
