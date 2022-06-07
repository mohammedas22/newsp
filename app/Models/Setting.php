<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    public function user(){
        return $this->hasOne(user::class);
    }

    public function admins(){
        return $this->hasMany(Admin::class);
    }
}
