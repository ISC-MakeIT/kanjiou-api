<?php

namespace Packages\Infrastructure\EloquentModels\Record;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model {
    use HasFactory;

    public const UPDATED_AT = null;
    protected $primaryKey   = 'record_id';
    protected $fillable     = [
        'game_mode_id',
        'name',
        'seconds_left',
    ];
}
