<?php

namespace Packages\Infrastructure\EloquentModels\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    use HasFactory;

	public const UPDATED_AT = null;
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id',
    ];
    protected $hidden = [
        'created_at'
    ];
}
