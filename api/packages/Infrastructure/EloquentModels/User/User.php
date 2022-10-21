<?php

namespace Packages\Infrastructure\EloquentModels\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

	public const UPDATED_AT = null;
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'username',
        'password'
    ];
    protected $hidden = [
        'username',
        'password',
        'created_at'
    ];
}
