<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;

class AnswersController extends Controller
{

    public function __construct(){
		$this->middleware('auth'); //included in Http/Kernel;
		//except index & show method, other methods cannot be accessed without loggin.
    }



    public function store(Request $request,$question_id){
        // dd($request->all());
        $question = Question::findOrFail($question_id);

        $answer = Answer::create([
            'answer'=> $request->answer,
            'author_id' => $request->user()->id,
            'question_id' => $question->id,

        ]);

        // return back();
        // return response()->json($answer);
        // return redirect(route('question.index'));
        return \redirect()->back();
    }
}
