<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany as HasMany;

class Genre extends Model
{
	public $incrementing = false;

    use HasFactory;
	protected $fillable = [
		'genre',
		'mood'
	];
	public $timestamps = false;
}
