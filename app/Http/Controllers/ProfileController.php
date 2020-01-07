<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function __construct(){
		$this->middleware('auth',['except'=> ['index', 'show']]); //included in Http/Kernel;
		//except index & show method, other methods cannot be accessed without loggin.
    }

    public function show($id){
        $user = User::findOrFail($id);
        $questions = \App\Question::all()->where('author_id',$user->id);
        return view('profile.show',compact(['user','questions']))->with('tags',\App\Tag::all());
    }

    public function professionupdate(Request $request, $id){
        // dd($request->all());
        $user = User::findOrFail($id);

        $user->profession = $request->profession;
        $user->update();
        
        return redirect()->back();
    }

    public function bioupdate(Request $request, $id){
        // dd($request->all());
        $user = User::findOrFail($id);

        $user->bio = $request->bio;
        $user->update();
        
        return redirect()->back();
    }
}
