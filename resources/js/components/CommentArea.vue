<template>
<div>
    <nav class="panel">
        <p class="panel-heading">
            コメント
        </p>
        <div class="container">
            <a v-for="comment in comments"  :key="comment.id" class="panel-block">
                <span class="panel-icon">
                    <i class="fas fa-user"></i>
                </span>
                {{ comment.comment }}
            </a>
        </div>
        <div class="panel-block">
            <button class="button is-link is-outlined" @click="commentModalActivate">
                <i class="far fa-comments index-icon"></i>
            </button>
        </div>
    </nav>
    <div id="comment-modal" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
            <p class="modal-card-title">新しいコメント</p>
            </header>
            <section class="modal-card-body">
                <textarea class="textarea" v-model="postComments" rows="2"></textarea>
                <button type="button" class="button is-primary" @click="addComments(id)">コメントする</button>
            </section>
            <footer class="modal-card-foot">
            <button class="button is-success" @click="commentModalDeactivate">Save changes</button>
            <button class="button" @click="commentModalDeactivate">Cancel</button>
            </footer>
        </div>
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
    props:['id'],
    data(){
        return{
            postComments:'',
            comments:[]
        }
    },
    mounted() {
            axios.post('http://127.0.0.1:8000/comment_index',{
            question_id: this.id
        })
        .then((res)=>{
            for(let i = 0;i < res.data.length;i++) {
                this.comments.push(res.data[i])
            }
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
            axios.post('http://127.0.0.1:8000/comment_store',{
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