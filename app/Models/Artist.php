<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model {
	use HasFactory;

	protected $fillable = [
		'name',
		'img_url'
	];
	public function albums() {
		return $this->belongsToMany(
			Album::class,
			'albums-artists','artist_id','album_id');
	}

	public $timestamps = false;
}
