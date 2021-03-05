<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $primaryKey = 'id';

    protected $guarded = ['id','created_ad','updated_at'];

    public static function  new($libelle, $level=2){
        Notification::create([
            'libelle'=>$libelle,
            'level'=>$level
        ]);
    }
}
