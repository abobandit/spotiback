<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ArtistRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
	        'name' => 'required',
	        'img_url' => 'nullable',
        ];
    }
	public function messages() {
		return [
			'name.required'       => 'name is required',
		];
	}

	protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator  ) {
		/**
		 * Create a new HTTP response exception instance.
		 *
		 * @param  \Symfony\Component\HttpFoundation\Response  $response
		 * @return void
		 */
		throw new HttpResponseException(response()->json([$validator->errors()]));
	}
}
