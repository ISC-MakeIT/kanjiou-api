<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatchScore extends Model
{
    use HasFactory;

    protected $table = 'CatchScore';
    protected $fillable = ['name', 'score'];
}
