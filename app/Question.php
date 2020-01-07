<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'author_id'];

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

   public function answers(){
    return $this->hasMany(Answer::class);
   }

   public function user(){
    return $this->belongsTo(User::class,'author_id');
   }
}
