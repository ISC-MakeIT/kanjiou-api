<?php

namespace Packages\Infrastructure\EloquentModels\TimeLimit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLimitDelete extends Model
{
    use HasFactory;

    protected $primaryKey = 'time_limit_id';
	public const UPDATED_AT = null;
    protected $fillable = [
        'time_limit_id'
    ];
}
