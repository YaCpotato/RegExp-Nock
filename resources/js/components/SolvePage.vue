<template>
    <div class="container">
        <div class="answer-area">
            <input type="text" v-model="baseString">
            <input type="text" v-model="regExp">
        </div>
        <div class="check-area">
            <div v-html="checkAnswer"></div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    props:{
        useMode:{
            type: String,
            required: true
        }
    },
    data(){
        return{
            baseString:'',
            regExp:'',
        }
    },
    methods: {
        getRightAnswer() {
            axios.post('http://localhost:8000/highlight')
            then((res)=>{
                    return res.data
                })
                    .catch(error => console.log(error))
        }
    },
    computed:{
        checkAnswer() {
            return this.getRightAnswer(this.baseString, this.regExp) || ''
        }
    }
}
</script>
