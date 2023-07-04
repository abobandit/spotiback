<?php

namespace App\Models;

use Illuminate\{Database\Eloquent\Factories\HasFactory, Database\Eloquent\Model};

class Track extends Model {
	use HasFactory;

	protected $fillable = [
		'title',
		'storage_dir',
		'album_id',
		'duration'
	];

	public function album() {
		return $this->belongsTo( Album::class );
	}

	public function playlists() {
		return $this->belongsToMany(
			Playlist::class,
			'playlists-tracks');
	}

	public $timestamps = false;

}
