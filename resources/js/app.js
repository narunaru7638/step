import Vue from 'vue'

// Vueの基本の書き方
new Vue({ // Vueインスタンス生成
    el: '#app1', // elでスコープを指定
    data: { // dataの中にプロパティを定義しておけば、vueの中で保持して使いまわせる。今回はテンプレートに表示している。
        message: 'vueのテンプレートの構文。{{}}で囲って処理が書ける。'
    }
})