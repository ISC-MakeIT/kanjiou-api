<?php

namespace Packages\Infrastructure\EloquentModels\GameMode;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameMode extends Model {
    use HasFactory;

    public const UPDATED_AT = null;
    protected $primaryKey   = 'game_mode_id';
    protected $fillable     = [
        'name',
    ];
}
