window.Vue = require('vue');
Vue.component('the-header', require('./components/TheHeader.vue').default);
Vue.component('solve-page', require('./components/SolvePage.vue').default);

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
                base_string: '123-0099 ririeooo',
                reg_exp: '/[0-9]{3}-[0-9]{4}/',
            },
        dataType: 'text',
        // フォーム要素の内容をハッシュ形式に変換
        timeout: 5000,
        success: function (result){
            console.log(result)
            $('#result').text(result);
        }
    })
    })