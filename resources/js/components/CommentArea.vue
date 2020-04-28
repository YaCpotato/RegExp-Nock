<template>
    <div id="app" class="container">
        <div class="content is-medium">
            <h2>Let me see your Question!</h2>
            <p>問題が出題できます。答えがわかっていたら、ぜひ正解とできるかチェックしてみましょう！</p>
        </div>
    <form action="/question_store" method="POST">
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
</template>

 <script>
import axios from 'axios'
axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};

export default {
    props:{
        useMode:{
            type: String,
            required: false,
            default: 'check'
        }
    },
    data(){
        return{
            baseString:'',
            regExp:'',
            checkAnswer:'',
            comments:''
        }
    },
    methods: {
        commentModalActivate() {
            let elements = document.getElementById('comment-modal');
            elements.classList.add('is-active');
        },
        commentModalDeactivate() {
            let elements = document.getElementById('comment-modal');
            elements.classList.remove('is-active');
        },
        addComments(questionId) {
            axios.post('http://127.0.0.1:8000/comment',{
                post_comment: this.postComments,
                question_id: questionId
            })
            .then((res)=>{
                console.log(res)
                return;
                })
                .catch(error => console.log(error))
        }
    }
}
</script>