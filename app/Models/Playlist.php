<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**

 * @property mixed $title
 */
class Playlist extends Model {
	use HasFactory;

	protected $fillable = [
		'user_id',
		'title'
	];

	public function user() {
		return $this->belongsTo( User::class );
	}
	public function checkCurrentUser($id){
		if ( Auth::user()->id == $id ) {
			return true;
		}else{
			return false;
		}
	}

	public function tracks() {
		return $this->belongsToMany(
			Track::class,
			'playlists-tracks' );
	}

	public $timestamps = false;
}
