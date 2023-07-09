<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AlbumRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['required'],
	        'type' => ['required'],
	        'genre'=>['required'],
	        'og_image' => ['nullable','image','mimes:png,jpeg,jpg'],
	        'artist_id' => ['required']
        ];
    }
	public function messages() {
		return [
			'title.required'       => 'title is required',
			'type.required'       => 'type is required',
			'genre.required'       => 'genre is required',
			'artist_id.required'       => 'artist_id is required',
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
