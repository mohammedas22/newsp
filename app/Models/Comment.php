<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function viewer(){
        return $this->belongsTo(Viewer::class);
    }

    public function article(){
        return $this->belongsTo(Article::class);
    }
}
