<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';

    protected $primaryKey = 'id';

    protected $guarded = ['id','created_ad','updated_at'];

    public function projet(){
        return $this->belongsTo(projet::class, 'projet_id', 'id');
    }
    
}
