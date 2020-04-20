<template>
    <div class="container">
        <p>コンポーネント</p>
        <!-- <div class="answer-area">
            <input type="text" v-model="baseString">
            <input type="text" v-model="regExp">
            <button>{{ buttonValue }}</button>
        </div>
        <div class="check-area">
            <div v-html="checkAnswer"></div>
        </div> -->
    </div>
</template>

 <script>
// import axios from 'axios'

// export default {
//     props:{
//         useMode:{
//             type: String,
//             required: false,
//             default: 'check'
//         }
//     },
//     data(){
//         return{
//             baseString:'',
//             regExp:'',
//         }
//     },
//     methods: {
//         getRightAnswer() {
//             axios.post('http://localhost:8000/highlight')
//             then((res)=>{
//                     return res.data
//                 })
//                     .catch(error => console.log(error))
//         }
//     },
//     computed:{
//         buttonValue() {
//             if (this.useMode === 'answer') {
//                 return '解答する'
//             } else if (this.useMode === 'check') {
//                 return 'チェックしてみる'
//             }
//         },
//         checkAnswer() {
//             return this.getRightAnswer(this.baseString, this.regExp) || ''
//         }
//     }
// }
</script>
<style>
.container {
    width:100%;
    height:auto;
}
</style>