<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public function user(){
        return $this->morphOne(User::class ,'actor' , 'actor_type' , 'actor_id' ,'id');
    }

    // public function Country(){
    //     return $this->belongsTo(Country::class);
    // }

    // public function setting(){
    //     return $this->belongsTo(Setting::class);
    // }
}
