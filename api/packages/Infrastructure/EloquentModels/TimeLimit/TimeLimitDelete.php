<?php

namespace Packages\Infrastructure\EloquentModels\TimeLimit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLimitDelete extends Model
{
    use HasFactory;

	public const UPDATED_AT = null;
    protected $primaryKey = 'time_limit_id';
    protected $fillable = [
        'time_limit_id'
    ];
}
