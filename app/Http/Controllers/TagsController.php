<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function create(){
        return view('tagCreate');
    }

    public function store(Request $request){
        //dd($request->all());
        Tag::create([
            'name' => $request->tag
        ]);
        return redirect(route('tag.create'));
    }
}
