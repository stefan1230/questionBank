<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['relpy','author_id','answer_id'];

    public function answer(){
        return $this->belongsTo(Answer::class);
    }
}
