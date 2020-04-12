@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card indivi-card">
        <div class="card-content">
            <p class="title">
                {{ $question->content }}
            </p>
            <p class="subtitle">
            出題者：{{ $question->user->name }}
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
</div>
@endsection