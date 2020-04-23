require('./bootstrap');
window.Vue = require('vue');
// Vue.component('theheader', require('./components/TheHeader.vue').default);
// Vue.component('solvepage', require('./components/SolvePage.vue').default);

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

// '123-0099 ririeooo',
// '/[0-9]{3}-[0-9]{4}/',