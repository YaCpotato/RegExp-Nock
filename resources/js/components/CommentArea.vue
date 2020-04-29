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
                <div style="position:absolute;right:0;">
                    <span class="icon" @click="editComment(comment.id,comment.comment)">
                        <i class="fas fa-edit" area-hidden="true"></i>
                    </span>
                    <span class="icon" @click="deleteComment(comment.id)">
                        <i class="fas fa-trash" area-hidden="true"></i>
                    </span>
                </div>
            </a>
        </div>
        <div class="panel-block">
            <button class="button is-link is-outlined" @click="commentModalActivate()">
                <i class="far fa-comments index-icon"></i>
            </button>
        </div>
    </nav>
    <div id="comment-modal" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p v-if="!editMode" class="modal-card-title">新しいコメント</p>
                <p v-else class="modal-card-title">コメントの編集</p>
            </header>
            <section class="modal-card-body">
                <textarea class="textarea" v-model="postComments" rows="2"></textarea>
            </section>
            <footer class="modal-card-foot">
            <button v-if="!editMode" type="button" class="button is-primary" @click="commentModalDeactivate();addComments(id);">コメントする</button>
            <button v-else type="button" class="button is-primary" @click="commentModalDeactivate();updateComment(currentEditId);">修正する</button>
            <button class="button" @click="commentModalDeactivate()">Cancel</button>
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
            comments:[],
            editMode: false,
            currentEditId:null
        }
    },
    mounted() {
        this.init()
    },
    methods: {
        init() {
            this.comments = [],
            this.currentEditId = null
            this.postComments = ''
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
                return;
                })
                .catch(error => console.log(error))
            this.init()
        },
        editComment(id,comment) {
            this.editMode = true
            this.postComments = comment
            this.currentEditId = id
            this.commentModalActivate()
        },
        updateComment(commentId) {
            axios.post('http://127.0.0.1:8000/comment_update',{
                comment_id: commentId,
                question_id: this.id,
                comment: this.postComments
            })
            .then((res)=>{
                return;
                })
                .catch(error => console.log(error))
            this.init()
        },
        deleteComment(commentId) {
            axios.post('http://127.0.0.1:8000/comment_delete',{
                comment_id: commentId,
                question_id: this.id
            })
            .then((res)=>{
                return;
                })
                .catch(error => console.log(error))
            this.init()
        }
    }
}
</script>