@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-content detail-card-content">
            <p class="title">
                {{ $question->content }}
            </p>
            <p class="subtitle">
            出題者：{{ $question->user->name }}
            </p>
            <p>閲覧数： {{ $question->view_count }}</p>
            <div class="example-area">
                <p class="subtitle">例題と解答</p>
                <p class="example-string">
                    example string
                </p>
                <p class="highlight-string">
                    example s<strong>tr</strong>ing
                </p>
            </div>
        </div>
        <footer class="card-footer">
            <p class="card-footer-item">
            <span>
                {{ $question->created_at }}
            </span>
            </p>
        </footer>
    </div>
</div>
@endsection