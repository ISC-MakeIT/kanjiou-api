<?php

namespace Packages\Infrastructure\EloquentModels\TimeLimit;

use Carbon\Carbon;
use Database\Factories\TimeLimitFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Packages\Domain\Models\TimeLimit\Entities\TimeLimit as DomainTimeLimit;
use Packages\Domain\Models\TimeLimit\ValueObjects\Name;
use Packages\Domain\Models\TimeLimit\ValueObjects\Seconds;
use Packages\Domain\Models\TimeLimit\ValueObjects\TimeLimitId;

class TimeLimit extends Model
{
	use HasFactory;

	public const UPDATED_AT = null;
    protected $primaryKey = 'time_limit_id';
	protected $fillable = [
		'name',
		'seconds',
	];

	protected $hidden = [
		'time_limit_id',
	];

    public function delete()
    {
        return $this->hasOne(TimeLimitDelete::class, 'time_limit_id', 'time_limit_id');
    }

    public function ofDomain(): DomainTimeLimit
    {
        return new DomainTimeLimit(
            TimeLimitId::of($this->time_limit_id),
            Name::of($this->name),
            Seconds::of($this->seconds),
            new Carbon($this->created_at)
        );
    }

    protected static function newFactory(): TimeLimitFactory
    {
        return new TimeLimitFactory();
    }
}
