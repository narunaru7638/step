import Vue from 'vue'

//カードタイプのSTEP表示のテンプレート
Vue.component('v-card', {
    props: ['index', 'id', 'title', 'created_at', 'pic_img', 'category_name', 'category_id', 'user_name', 'user_id'],

    template: `
        <div class="c-article-card">
            <a v-bind:href="'/detail-steps/'+id">
                <img class="c-article-card__img" v-if="pic_img !== null" v-bind:src="'/storage/'+pic_img" alt="" >
                <img class="c-article-card__img" v-if="pic_img === null" v-bind:src="'/storage/sample-img.png'" alt="" >
            </a>
            <div class="c-article-card__info">
                <a :href="'/show-steps/'+category_id"><p class="c-article-card__category">{{category_name}}</p></a>
                <a v-bind:href="'/show-profile/'+user_id"><p class="c-article-card__username">{{user_name}}</p></a>
                <p class="c-article-card__date">{{created_at}}</p>
            </div>
            <a v-bind:href="'/detail-steps/'+id"><p class="c-article-card__title">{{title}}</p></a>
        </div>
`
})

//リストタイプのSTEP表示のテンプレート
Vue.component('v-list', {
    props: ['index', 'id', 'title', 'created_at', 'pic_img', 'category_name','category_id', 'user_name', 'user_id'],

    template: `
        <div class="c-article-list">
            <a class="c-article-list__img" v-bind:href="'/detail-steps/'+id">
                <img v-if="pic_img !== null" v-bind:src="'/storage/'+pic_img" alt="" >
                <img v-if="pic_img === null" v-bind:src="'/storage/sample-img.png'" alt="" >
            </a>
            <div class="c-article-list__content">
                <div class="c-article-list__info">
                    <a :href="'/show-steps/'+category_id"><p class="c-article-list__category" >{{category_name}}</p></a>
                    <a v-bind:href="'/show-profile/'+user_id"><p class="c-article-list__username" >{{user_name}}</p></a>
                    <p class="c-article-list__date" >{{created_at}}</p>
                </div>
                <a v-bind:href="'/detail-steps/'+id"><p class="c-article-list__title" >{{title}}</p></a>
            </div>
        </div>
`
})

//ページネーションのテンプレート
Vue.component('v-pagination', {
    props: {
        data: {}  // paginate()で取得したデータ
    },
    methods: {
        //ページリンクがクリックされたらmove(page)を実行するメソッド
        //move(page)の内部ではmove-pageという独自のイベントを呼び出し側に通知
        move(page) {
            if(!this.isCurrentPage(page)) {
                this.$emit('move-page', page);
            }
        },
        isCurrentPage(page) {
            return (this.data.current_page == page);// laravelでpaginate()を利用したときに用意されるcurrent_page(現在のページ番号)
        },
        getPageClass(page) {
            let classes = ['page-item'];
            if(this.isCurrentPage(page)) {
                classes.push('active');
            }
            return classes;
        }
    },
    computed: {
        // 「前へ」を表示するかどうかを判断する疑似変数
        hasPrev() {
            return (this.data.prev_page_url != null);
        },
        // 「次へ」を表示するかどうかを判断する疑似変数
        hasNext() {
            return (this.data.next_page_url != null);
        },
        //ページの数が配列になって返ってくる
        pages() {
            let pages = [];
            for(let i = 1 ; i <= this.data.last_page ; i++) {
                pages.push(i);
            }
            return pages;
        }
    },
    template:`
        <div class="c-pagination">
            <ul class="c-pagination__list">
                <li class="c-pagination__list-item" v-if="hasPrev">
                    <a class="c-pagination__link" href="#" @click.prevent="move(data.current_page-1)">&lt;</a>
                </li>
                <li class="c-pagination__list-item" :class="getPageClass(page)" v-for="page in pages">
                    <a class="c-pagination__link" href="#" v-text="page" @click.prevent="move(page)"></a>
                </li>
                <li class="c-pagination__list-item" v-if="hasNext">
                    <a class="c-pagination__link" href="#" @click.prevent="move(data.current_page+1)">&gt;</a>
                </li>
            </ul>
        </div>
`
});

new Vue({
    el: '#steps-index',
    data: {
        page: 1,
        items: [],
        category: 0
    },
    methods: {
        getSteps() {
            //カテゴリーIDが取得できなかった場合
            if(isNaN(this.category)){
                //AjaxでSTEPデータを取得
                const ajax_url = '/ajax/step?page='+ this.page;
                axios.get(ajax_url)
                    .then(response => {
                        this.items = response.data;
                    });
            //カテゴリーIDが取得できた場合
            }else{
                //AjaxでSTEPデータを取得
                const ajax_url = '/ajax/step/'+this.category+'?page='+ this.page;
                axios.get(ajax_url)
                    .then(response => {
                        this.items = response.data;
                    });
            }
        },
        movePage(page) {
            this.page = page;//pageをthis.pageに代入
            this.getSteps();//STEP情報をAjaxで取得する
        },
        getCategoryId(){
            //URLの「show-steps/」以降をカテゴリーIDとして取得する
            let url_param_category  = location.href;//URLの文字列を取得
            let index = url_param_category.indexOf('show-steps');//URLの文字列の「show-steps」の開始位置を取得
            let category_id = url_param_category.slice(index + 11);//「show-steps」のあとの文字を取得(show-steps/以降なので11文字分飛ばす)
            this.category = parseInt(category_id);//取得した文字を変数categoryに保存
        }
    },
    mounted() {
        this.getCategoryId();//ページが読み込まれたときにカテゴリーIDを取得
        this.getSteps();//ページが読み込まれたときにステップデータを取得
    },
    routes: [
        // コロンで始まる動的セグメント
        { path: '/show-steps/:id', component: Vue }
    ]
});
