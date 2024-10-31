<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminUser extends Authenticatable {
    use SoftDeletes;

    protected $fillable = ['email', 'password'];
    protected $hidden = ['password'];
}
