<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 */
class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'description', 'sex', 'state', 'user_activity', 'url', 'dob', 'picture'
    ];
}



