@extends('layouts.app')
@section('content')
<div class="container">
    <div class="columns">
        <div class="column"><!--TBW--></div>
        <div class="column is-half">
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
                        View on <a href="https://twitter.com/codinghorror/status/506010907021828096">Twitter</a>
                    </span>
                    </p>
                    <p class="card-footer-item">
                    <span>
                        Share on <a href="#">Facebook</a>
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