<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class Admin extends Authenticatable
{
    use HasFactory , HasRoles ;

    public function user(){
        return $this->morphOne(User::class ,'actor' , 'actor_type' , 'actor_id' ,'id');
    }

    public function Country(){
        return $this->belongsTo(Country::class);
    }

}
