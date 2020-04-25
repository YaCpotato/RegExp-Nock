<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\Comment;
use DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('user')->get();
        $questions = DB::select("
            WITH how_comments as (
                SELECT 
                    question_id as hc_question_id, 
                    COUNT(*) as comments_count
                FROM comments
                GROUP BY comments.question_id
            ),
            how_answers as (
                SELECT 
                    answers.target_q_id as hw_q_id,
                    COUNT(*) as answers_count
                FROM answers
                GROUP BY answers.target_q_id
            ),
            user_name as (
                SELECT 
                    users.id as id,
                    users.name as name
                FROM users
            )
            SELECT  questions.id,
                    questions.content,
                    user_name.name as user_name,
                    questions.answer,
                    questions.created_at,
                    questions.updated_at,
                    questions.view_count,
                    IFNULL(how_comments.comments_count, 0) as comments_count,
                    IFNULL(how_answers.answers_count, 0) as answers_count
            FROM questions
            LEFT OUTER JOIN user_name
            ON questions.user_id = user_name.id
            LEFT OUTER JOIN how_comments
            ON questions.id = how_comments.hc_question_id
            LEFT OUTER JOIN how_answers
            ON questions.id = how_answers.hw_q_id
        ");
        $auths = \Auth::user();
        return view('question/index', compact('questions', 'auths'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auths = \Auth::user();
        return view('question/create',compact('auths'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = new question;
        $question->content = $request->content;
        $question->answer = $request->answer;
        $question->comments = $request->comments;
        $question->user_id = \Auth::user()->id;
        $question->save();
        $auths = \Auth::user();
        return view('question/detail', compact('question', 'auths'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        $this->incrementViewCount($question);
        $auths = \Auth::user();
        return view('question/detail', compact('question', 'auths'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        return view('question_edit', compact('question'));
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
        $question = Question::findOrFail($id);
        $question->content = $request->content;
        $question->answer = $request->answer;
        $question->comments = $request->comments;
        $question->save();
        return view('question_update/'.$id,compact('question'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        
        $questions = Question::all();
        return view('question_index', compact('questions'));
    }

    /**
     * 文字列と正規表現を受け取り、正規表現にマッチした部分を<strong>で囲んで返すメソッド
     *
     * @param  int  $id
     * @return highlightedString
     */
    public function textHighlight(Request $request)
    {
        $string = $request->base_string;
        $regExp = $request->reg_exp;
        $result = preg_replace($regExp, '<strong>$0</strong>', $string);
        
        return response($result, 200);
    }

    private function incrementViewCount(Question $question)
    {
        $question->view_count += 1;
        $question->save();
    }
}
