<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
	protected $fillable = [
		'title',
		'type',
		'genre_id',
		'og_image'
	];
	public function tracks(){
		return $this->hasMany(Track::class);
	}
	public function genre(){
		return $this->belongsTo(Genre::class);
	}
	public function artists(){
		return $this->belongsToMany(
			Artist::class,
			'albums-artists');
	}
	public $timestamps = false;
}
