<?php

namespace Packages\Infrastructure\EloquentModels\Rank;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model {
    use HasFactory;

    public const UPDATED_AT = null;
    protected $primaryKey   = 'rank_id';
    protected $fillable     = [
        'game_mode_id',
        'name',
        'seconds_left',
    ];
}
