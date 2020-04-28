<template>
    <nav class="panel">
        <p class="panel-heading">
            コメント
        </p>
        <div class="container">
            <a v-for="comment in comments"  :key="comment" class="panel-block">
                <span class="panel-icon">
                    <i class="fas fa-user"></i>
                </span>
                {{ comment }}
            </a>
        </div>
        <div class="panel-block">
            <button class="button is-link is-outlined" @click="commentModalActivate">
                <i class="far fa-comments index-icon"></i>
            </button>
        </div>
    </nav>
</template>

 <script>
import axios from 'axios'
axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};

export default {
    props:{
        questionid:{
            type: Number,
            required: true
        }
    },
    data(){
        return{
            postComments:'',
            comments:[]
        }
    },
    mounted() {
        axios.get('http://127.0.0.1:8000/comment',{
            question_id: this.questionid
        })
        .then((res)=>{
            for(let i = 0;i < res.data.length;i++) {
                this.comments.push(res.data[i])
            }
            console.log(this.comments)
            return;
            })
            .catch(error => console.log(error))
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