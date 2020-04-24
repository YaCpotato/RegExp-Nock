@extends('layouts.app')
@section('content')
<div class="container">
    <div class="columns">
        <div class="column"><!--TBW--></div>
        <div class="column is-half">
            <div class="intro-and-button-area box has-text-centered">
                <p>
                    RegExpノックセンターへようこそ<br>正規表現に関する日常生活での質問を投げたり、問題として出したり、<br>腕試しで挑戦したりできるよ！
                </p>
                <a class="button is-primary" style="margin: 8px;" href="{{ url('question_create') }}">問題を出す</a>
            </div>
            <div class="trend">
            @foreach($questions as $question)
            <a href="{{ url('question_detail',$question->id) }}">
            <div class="card question-card">
                <div class="card-content">
                    <p class="title">
                        {{ $question->content }}
                    </p>
                    <p class="subtitle">
                    {{ $question->user_name }}
                    </p>
                </div>
                <footer class="card-footer">
                    <p class="card-footer-item">
                    <span>
                        {{ $question->created_at }}
                    </span>
                    </p>
                    <p class="card-footer-item">
                    <span><i class="far fa-comments"></i>NUMBER</span>
                    <span><i class="fas fa-baseball-ball"></i>NUMBER</span>
                    </p>
                </footer>
                </div>
            </a>
            @endforeach
            </div>
            <div class="newer">
            @foreach($questions as $question)
      
            @endforeach
            </div>
        </div>
        <div class="column"><!--TBW--></div>
    </div>
</div>
@endsection