<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param int questionId 
     */
    public function index(Request $request)
    {
        $comments = Comment::query()->where('question_id',$request->question_id)->get(); 
        return $comments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id question_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->comment = $request->post_comment;
        $comment->user_id = \Auth::user()->id;
        $comment->question_id = $request->question_id;
        $comment->save();

        $comments = Comment::query()->where('question_id',$request->question_id)->get();
        // $auths = \Auth::user();
        // $question = Question::find($request->question_id);
        return $comments;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @param  int  $questionId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $questionId)
    {
        $comment = Comment::findOrFail($id);
        $comment->comment = $request->comment;
        $comment->save();

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
        $comment = Comment::findOrFail($id);
        $comment->delete();
        
        $comments = Comment::all();
        return view('comment/index', compact('comments'));
    }
}
