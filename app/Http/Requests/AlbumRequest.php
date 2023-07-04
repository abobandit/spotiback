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
	        'genre_id'=>['required'],
	        'og_image' => ['required','image','mimes:png,jpeg,jpg'],
	        'artist_id' => ['required']
        ];
    }
	public function messages() {
		return [
			'title.required'       => 'title is required',
			'type.required'       => 'type is required',
			'genre_id.required'       => 'genre_id is required',
			'og_image.required'       => 'og_image is required',
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
