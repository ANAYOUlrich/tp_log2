<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as Basic;

class User extends Model implements Authenticatable
{
	use Basic;

    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $guarded = ['id','created_ad','updated_at'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime',];
}
