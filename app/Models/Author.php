<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Author extends Model
{
    use HasFactory , HasRoles ;
    public function user(){
        return $this->morphOne(User::class ,'actor' , 'actor_type' , 'actor_id' ,'id');
    }

    public function Country(){
        return $this->belongsTo(Country::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class , 'author_categories') ;
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }
}
