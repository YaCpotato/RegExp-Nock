<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Comments;

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
        $questionId = Question::findOrFail($id)->id;

        $answer = new Answer;
        $answer->answer = $request->name;
        $answer->user_id = \Auth::user()->id;
        $answer->target_q_id = $questionId;
        $answer->comments = $request->name;
        $answer->save();

        $question = Question::find($questionId);
        $comments = Comment::query()->where('question_id',$questionId)->get();
        return view('question/detail', compact('question','comments'));
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
    public function update(Request $request, $questionId, $id)
    {
        $answer = Answer::findOrFail($id);
        $answer->answer = $request->name;
        $answer->comments = $request->name;
        $answer->save();
        
        $question = Question::find($questionId);
        $comments = Comment::query()->where('question_id',$questionId)->get();
        return view('question/detail', compact('question','comments'));
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
