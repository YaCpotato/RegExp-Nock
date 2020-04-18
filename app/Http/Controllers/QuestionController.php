<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

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
        return view('question/create');
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
        $question->content = $request->name;
        $question->answer = $request->name;
        $question->comments = $request->name;
        $question->user_id = \Auth::user()->id;
        $question->save();
        return redirect('question/'.$question->id);
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
        return view('question/edit', compact('question'));
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
        return view('question/detail',compact('question'));
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
        return view('question/index', compact('questions'));
    }

    /**
     * 文字列と正規表現を受け取り、正規表現にマッチした部分を<strong>で囲んで返すメソッド
     *
     * @param  int  $id
     * @return highlightedString
     */
    public function textHighlight(Request $request)
    {
        // $string = $request->base_string;
        // $regExp = $request->reg_exp;
        $string = 'abcdefg';
        $regExp = '/[a-z]/';

        $match_num = preg_match_all($regExp, $string, $matches);

        foreach ($matches as $key => $match) {
            preg_replace($regExp, `<strong>.$match[0][$key].</strong>`, $string);
        }
        
        return $string;
    }

    private function incrementViewCount(Question $question)
    {
        $question->view_count += 1;
        $question->save();
    }
}
