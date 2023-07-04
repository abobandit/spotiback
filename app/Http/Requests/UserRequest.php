<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{

    public function rules(): array
    {
        return [
	        'first_name' => 'required',
	        'login' => 'required',
	        'role' => 'nullable',
	        'last_name'  => 'required',
	        'patronymic' => 'nullable',
	        'email'      => 'required|email|unique:users,email',
	        'password'   => 'required',
        ];
    }
	public function messages() {
		return [
			'first_name.required'       => 'first_name is required',
			'login.required'       => 'login is required',
			'last_name.required'       => 'last_name is required',
			'email.required'    => 'email is required',
			'password.required' => 'password is required',
		];
	}

	protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator  ) {
		/**
		 * Create a new HTTP response exception instance.
		 *
		 * @param  \Symfony\Component\HttpFoundation\Response  $response
		 * @return void
		 */
		throw new HttpResponseException(response()->json([$validator->errors()]),400);
	}
}
