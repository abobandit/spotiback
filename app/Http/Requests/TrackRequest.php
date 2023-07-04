<?php

namespace App\Http\Requests;

use Dotenv\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;


class TrackRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
	 */

	public function rules(): array {
		return [
			'title'       => 'required',
			'album_id'    => 'required',
			'storage_dir' => [ 'required', 'mimes:mp3' ],
			'duration'    => 'nullable'

		];
	}

	public function messages() {
		return [
			'title.required'       => 'Title is required',
			'album_id.required'    => 'album id is required',
			'storage_dir.required' => 'storage directory is required',
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

