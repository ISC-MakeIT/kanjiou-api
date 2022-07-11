<?php

namespace Packages\Infrastructure\EloquentModels\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

	public const UPDATED_AT = null;
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'email',
        'password'
    ];
    protected $hidden = [
        'email',
        'password',
        'created_at'
    ];
}
