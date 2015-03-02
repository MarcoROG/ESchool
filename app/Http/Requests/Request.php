<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Laracasts\Flash\Flash;

abstract class Request extends FormRequest {

    /**
     * Returns an error on failed validation
     * @param array $errors
     * @return $this
     */
    public function response(array $errors)
    {
        Flash::warning(reset($errors)[0]);
        return redirect('users/add')->withInput();
    }
}
