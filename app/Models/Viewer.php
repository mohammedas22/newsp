<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viewer extends Model
{
    use HasFactory;
    public function Viewer(){
        return $this->morphOne(Viewer::class ,'actor' , 'actor_type' , 'actor_id' ,'id');
    }

    public function Country(){
        return $this->belongsTo(Country::class);
    }

    public function setting(){
        return $this->belongsTo(Setting::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
