<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
			'id'  => $this->id,
	        'name' => $this->name,
	        'img_url' => $this->img_url
// 	        'albums' => $this->albums()->get(['id','title','genre','og_image'])
        ];
    }
}
