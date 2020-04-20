<template>
    <div id="app" class="container">
        <div class="answer-area">
            <input type="text" v-model="baseString">
            <input type="text" v-model="regExp">
            <button @click="getRightAnswer">{{ buttonValue }}</button>
        </div>
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
                reg_exp: this.regExp
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