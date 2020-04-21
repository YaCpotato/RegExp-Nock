<template>
    <div id="app" class="container">
        <div class="content is-medium">
            <h2>Let me see your Question!</h2>
            <p>問題が出題できます。答えがわかっていたら、ぜひ正解とできるかチェックしてみましょう！</p>
        </div>
        <div class="field">
            <label class="label">対象文字列</label>
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        <textarea class="textarea" v-model="baseString"></textarea>
                    </p>
                </div>
            </div>
        </div>
        <div class="field">
            <label class="label">正規表現</label>
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
        <button class="button is-info" @click="getRightAnswer">{{ buttonValue }}</button>
        <div class="check-area">
            <div v-html="checkAnswer"></div>
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
            checkAnswer:''
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
        }
    },
    computed:{
        buttonValue() {
            if (this.useMode === 'answer') {
                return '解答する'
            } else if (this.useMode === 'check') {
                return 'チェックしてみる'
            }
        }
    }
}
</script>