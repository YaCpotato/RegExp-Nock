require('./bootstrap');
window.Vue = require('vue');

const app = new Vue({
    el: '#app',
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
            axios.post('http://127.0.0.1:8000/highlight',{
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
    }
});

const detail = new Vue({
    el: '#detail',
    data(){
        return{
            postComments:''
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
                post_comment: postComments,
                question_id: questionId
            })
            .then((res)=>{
                console.log(res)
                return;
                })
                .catch(error => console.log(error))
        }
    }
});