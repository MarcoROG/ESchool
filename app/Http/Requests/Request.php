<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
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

        if ($this->ajax() || $this->wantsJson())
        {
            return new JsonResponse($errors, 422);
        }

        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash));

//        return redirect()->back()->withInput();
    }
}
