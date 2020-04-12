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
                <button class="button is-primary" style="margin: 8px;">問題を出す</button>
            </div>
            <div class="trend">
            @foreach($questions as $question)
            <div class="card">
                <div class="card-content">
                    <p class="title">
                        {{ $question->content }}
                    </p>
                    <p class="subtitle">
                    {{ $question->user->name }}
                    </p>
                </div>
                <footer class="card-footer">
                    <p class="card-footer-item">
                    <span>
                        {{ $question->created_at }}
                    </span>
                    </p>
                </footer>
                </div>
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