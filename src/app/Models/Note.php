<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ApiController;
use App\Models\Coment;

class Note extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user(){

        return $this->belongsTo('App\Models\User');
    }

    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s' 
    ];

    public function coments(){
        return $this->hasMany('App\Models\Coment');
    }

}
