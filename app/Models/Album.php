<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo as BelongsTo;

class Album extends Model
{
    use HasFactory;
	protected $fillable = [
		'title',
		'type',
		'genre',
		'og_image'
	];
	public function tracks(){
		return $this->hasMany(Track::class);
	}
	public function genre(): BelongsTo {
		return $this->belongsTo(Genre::class,);
	}
	public function artists(){
		return $this->belongsToMany(
			Artist::class,
			'albums-artists','album_id','artist_id');
	}
	public $timestamps = false;
}
