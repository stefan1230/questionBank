<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['answer','author_id','question_id'];

    public function questions(){
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        //** add the foreign key name */
        return $this->belongsTo(User::class,'author_id');
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }

}
