window.Vue = require('vue');
Vue.component('the-header', require('./components/TheHeader.vue').default);
const app = new Vue({
    el: '#app',
});

$('#btnsend').on('click', function(){
    console.log('click')
    $('#result').text('通信中...');
    // Ajax通信を開始
    $.ajax({
        url:'http://localhost:8000/highlight',
        headers: {
            　　　'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            　　},
            type:'POST',
            data:{
                base_string: '.*',
                reg_exp: 'b',
            },
        dataType: 'json',
        // フォーム要素の内容をハッシュ形式に変換
        timeout: 5000,
    })
    .done(function(data) {
        console.log(data)
    })
    .fail(function() {
        // 通信失敗時の処理を記述
    });
    })