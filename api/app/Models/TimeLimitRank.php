<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLimitRank extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = [
        'rank',
        'name',
        'seconds',
    ];
}
