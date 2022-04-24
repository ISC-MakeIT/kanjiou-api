<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'seconds',
    ];

    protected $hidden = [
        'id',
        'updated_at'
    ];

    protected $casts = [
        'seconds' => 'int'
    ];
}
