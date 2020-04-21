<template>
    <div id="app" class="container">
    <div v-if="useMode === 'check'">
        <div class="content is-medium">
            <h2>Let me see your Question!</h2>
            <p>問題が出題できます。答えがわかっていたら、ぜひ正解とできるかチェックしてみましょう！</p>
        </div>
        <div class="field">
            <label class="label is-large">対象文字列</label>
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        <textarea class="textarea" v-model="baseString" rows="2"></textarea>
                    </p>
                </div>
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
                        <input class="input" type="textarea" v-model="regExp">
                    </p>
                    <p class="control">
                        <a class="button is-static">
                        /
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div v-if="useMode === 'check'">
            <button class="button is-info" @click="getRightAnswer">チェックしてみる</button>
            <div class="field check-area">
                <div v-html="checkAnswer"></div>
            </div>
            <div class="field">
                <label class="label is-large">補足説明（空欄可）　〜ヒント等あったら書いてみましょう！〜</label>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <textarea class="textarea" v-model="comments" rows="2"></textarea>
                        </p>
                    </div>
                </div>
            </div>
            <button class="button is-primary" @click="addQuestion">出題する</button>
        </div>
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
        getRightAnswer() {
            axios.post('http://localhost:8000/highlight',{
                base_string: this.baseString,
                reg_exp: `/${this.regExp}/`
            })
            .then((res)=>{
                this.checkAnswer = res.data
                console.log(this.checkAnswer)
                return;
                })
                .catch(error => console.log(error))
        },
        addQuestion() {
            axios.post('http://localhost:8000/question_store',{
                content: this.baseString,
                answer: `/${this.regExp}/`,
                comments: this.comments
            })
            .then((res)=>{
                return;
                })
                .catch(error => console.log(error))
        }
    }
}
</script>