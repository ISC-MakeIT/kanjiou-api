<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLimit extends Model
{
	use HasFactory;

	public const UPDATED_AT = null;
	protected $fillable = [
		'name',
		'seconds',
	];

	protected $hidden = [
		'time_limit_id',
	];
}
