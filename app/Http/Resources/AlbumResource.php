<?php

namespace App\Http\Resources;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Artist;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
			'id' => $this -> id,
			'title' => $this -> title,
	        'type' => $this -> type,
	        'og_image'=> $this -> og_image,
			"genre" => $this->genre,
			"tracks" => TrackResource::collection($this->tracks),
	        'artists' => ArtistResource::collection($this->artists)
        ];
    }
}
