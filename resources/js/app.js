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
            
        }
    },
    methods: {
        commentModalActivate() {
            $('.comment-modal').addClass('is-active');
        },
        commentModalDeactivate() {
            $('.comment-modal').removeClass('is-active');
        }
    }
});