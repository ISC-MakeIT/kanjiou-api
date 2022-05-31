<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public static function to_delete(int $time_limit_id)
    {
        TimeLimitDelete::updateOrCreate(['time_limit_id' => $time_limit_id], []);
    }
    public static function find_rank(int $seconds)
    {
        $rank = 1;
		$time_limit_ranks = TimeLimit::find_all();
        foreach ($time_limit_ranks as $index => $time_limit_rank) {
            if ($index == count($time_limit_ranks) - 1 && $seconds != $time_limit_rank['seconds']) {
                $rank = $index + 1;
                break;
            }
            if ($seconds <= $time_limit_rank['seconds']) {
                $rank = $time_limit_rank['rank'];
                continue;
            }
            if ($seconds > $time_limit_rank['seconds']) break;
        }
        return $rank;
    }
    public static function find_all()
    {
		$time_limits = TimeLimit::doesntHave('delete')
                        ->orderBy('seconds', 'desc')
                        ->take(100)
                        ->get();
        $max_rank = 1;
        $min_seconds = 60;
        $time_limits = $time_limits->toArray();
        foreach ($time_limits as $index => &$time_limit) {
            if ($min_seconds > $time_limit['seconds']) {
                $min_seconds = $time_limit['seconds'];
                $max_rank = $index + 1;
                $time_limit['rank'] = $max_rank;
                continue;
            }
            if ($min_seconds == $time_limit['seconds']) {
                $time_limit['rank'] = $max_rank;
                continue;
            }
            $time_limit['rank'] = $index + 1;
        }
        return $time_limits;
    }
}
