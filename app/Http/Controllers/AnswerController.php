<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class AnswerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('answer/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $answer = new Answer;
        $answer->answer = $request->name;
        $answer->user_id = \Auth::user()->id;
        $answer->target_q_id = Question::findOrFail($id)->id;
        $answer->comments = $request->name;
        $answer->save();
        return redirect('answer/'.$answer->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $answer = Answer::find($id);
        return view('answer/edit', compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $answer = Answer::findOrFail($id);
        $answer->answer = $request->name;
        $answer->comments = $request->name;
        $answer->save();
        return view('answer/detail',compact('answer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = Answer::findOrFail($id);
        $answer->delete();
        
        $answers = Answer::all();
        return view('answer/index', compact('answers'));
    }
}
