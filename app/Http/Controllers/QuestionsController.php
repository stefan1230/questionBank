<?php

namespace App\Http\Controllers;
use App\Question;
use App\Tag;
use App\User;
use App\Answer;



use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function __construct(){
		$this->middleware('auth',['except'=> ['index', 'show','tag']]); //included in Http/Kernel;
		//except index & show method, other methods cannot be accessed without loggin.
    }
    
    public function index(){
        return view('question.queIndex')
            ->with('questions', Question::latest()->get())
            ->with('tags',Tag::all());
    }

    // public function create(){
    //     return view('question.queCreate')->with('tags',Tag::all())->with('questions', Question::all());
    // }

    public function show($id){

        $question = Question::findOrFail($id);
        $user = User::findOrFail($question->author_id);
        $tags = Tag::all();
        return view('question.queShow',compact(['question','user','tags']));
    }

    public function store(Request $request){
        //dd($request->all());
        $question = Question::create([
            'question' => $request->question,
            'author_id' => auth()->user()->id
        ]);

        if($request->tags){
            $question->tags()->attach($request->tags);
        }

        return redirect(route('question.index'));
    }

    // public function edit($id){
    //     $question = Question::findOrFail($id);
    //     return view('question.queEdit',compact('question'))->with('tags',Tag::all());
    // }

    public function update(Request $request, $id){
        $input = $request->all();
        $question = Question::findOrFail($id);

        if($request->tags){
            $question->tags()->sync($request->tags);
        }

        $question->update($input);
        
        return redirect(route('question.index'));
    }

    public function destroy(Request $request, $id){
        $question = Question::findOrFail($id);
        $question->delete($request->all());

        return redirect(route('question.index'));
    }


    //function to get all questions associated with a Tag.
    public function tag(Request $request, $id){
        $tag = Tag::findOrFail($id);
        $questionTag = Tag::findOrFail($id)->questions;

        return view('question.queTag')->with('questionsTag',$questionTag)->with('tag',$tag)->with('tags',Tag::all())->with('questions',Question::all());
    }
}
 