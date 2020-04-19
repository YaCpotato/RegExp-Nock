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
            
        }
    },
    computed:{
        checkAnswer() {
            return this.getRightAnswer(this.baseString, this.regExp) || ''
        }
    }
}
</script>
