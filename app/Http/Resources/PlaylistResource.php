<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class PlaylistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return   [
			'id' => $this->id,
	        "title"=>$this->title,

//	        "bookings"=>BookingResource::collection($this->bookings),
//            getSomeBookings(),
//                Booking::where("event_id",$event->id)->get(),
        ];
    }
}
