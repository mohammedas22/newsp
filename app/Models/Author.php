<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    public function author(){
        return $this->morphOne(Author::class ,'actor' , 'actor_type' , 'actor_id' ,'id');
    }

    public function Country(){
        return $this->belongsTo(Country::class);
    }

    public function setting(){
        return $this->belongsTo(Setting::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class , 'author_categories') ;
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }
}
