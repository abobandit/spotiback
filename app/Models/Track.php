<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
	protected $fillable = [
		'title',
		'storage_dir',
		'album_id',
		'og_image'
	];
	public $timestamps = false;

}
