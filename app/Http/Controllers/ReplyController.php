<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;

class ReplyController extends Controller
{
    public function store(Request $request, $answer_id){

        Reply::create([
            'reply'=> $request->reply,
            'answer_id'=> $answer_id,
            'author_id'=> $request->user()->id
        ]);

        return redirect()->back();
    }
}
