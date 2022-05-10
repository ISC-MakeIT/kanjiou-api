<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLimitDelete extends Model
{
    use HasFactory;

	public const UPDATED_AT = null;
    public $fillable = [
        'name',
        'seconds',
    ];
}
