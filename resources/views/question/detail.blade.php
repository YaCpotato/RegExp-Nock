@extends('layouts.app')
@section('content')
<div id="detail" class="container">
    <div class="card detail-card">
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
    <comment-area :questionid="{{ $question->id }}"></comment-area>
    <div id="comment-modal" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
            <p class="modal-card-title">新しいコメント</p>
            </header>
            <section class="modal-card-body">
                <textarea class="textarea" v-model="postComments" rows="2"></textarea>
                <button type="button" @click="addComments({{ $question->id }})">
            </section>
            <footer class="modal-card-foot">
            <button class="button is-success" @click="commentModalDeactivate">Save changes</button>
            <button class="button" @click="commentModalDeactivate">Cancel</button>
            </footer>
        </div>
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
@endsection