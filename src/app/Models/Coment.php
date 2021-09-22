<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Note;

class Coment extends Model
{
    use HasFactory;

    public function note(){
        return $this->belongsTo('App\Models\Note');
    }
}
