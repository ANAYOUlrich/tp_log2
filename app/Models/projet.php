<?php

namespace App\Models;
use App\Models\projet;
use App\Models\Log;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class projet extends Model
{
    protected $table = 'projets';

    protected $primaryKey = 'id';

    protected $guarded = ['id','created_ad','updated_at'];

    public function logs(){
        return $this->hasMAny(Log::class, 'projet_id', 'id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class, 'creer_par', 'id');
    }

    public function updateBy(){
        return $this->belongsTo(User::class, 'modifier_par', 'id');
    }
}
