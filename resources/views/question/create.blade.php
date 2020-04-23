@extends('layouts.app')
@section('content')
<div id="app" class="column">
<div class="container">
        <div class="content is-medium">
            <h2>Let me see your Question!</h2>
            <p>問題が出題できます。答えがわかっていたら、ぜひ正解とできるかチェックしてみましょう！</p>
        </div>
    <form action="{{ url('question_store') }}" method="POST">
        @csrf
        <div class="field">
            <label class="label is-large">対象文字列</label>
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        <textarea class="textarea" v-model="baseString" name = "content" rows="2"></textarea>
                    </p>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label is-large">正規表現</label>
            <div class="field-body">
                <div class="field has-addons answer-area">
                    <p class="control">
                        <a class="button is-static">
                        /
                        </a>
                    </p>
                    <p class="control is-expanded">
                        <input class="input" type="textarea" v-model="regExp" name = "answer">
                    </p>
                    <p class="control">
                        <a class="button is-static">
                        /
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <button type="button" class="button is-info" @click="getRightAnswer">チェックしてみる</button>
        <div class="field check-area">
            <div v-html="checkAnswer"></div>
        </div>
        <div class="field">
            <label class="label is-large">補足説明（空欄可）　〜ヒント等あったら書いてみましょう！〜</label>
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        <textarea class="textarea" v-model="comments" name = "comments" rows="2"></textarea>
                    </p>
                </div>
            </div>
        </div>
        <button type="submit" class="button is-primary">出題する</button>
    </form>
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
@endsection