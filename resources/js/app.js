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

//stepの一覧表示用のインスタンス
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


//STEP登録フォームのテンプレート
Vue.component('v-create-step-form', {
    // コンポーネントで使う場合のdataは必ず関数にすること！通常のオブジェクト形式だと全コンポーネントでdataが共有されてしまう
    data: function () {
        return {
            count: 1,
        }
    },
    props: ['form_id', 'old_value', 'old_number_of_childstep', 'count_of_childstep',
            'old_childstep1_title', 'old_childstep1_content', 'old_childstep1_required_time',
            'old_childstep2_title', 'old_childstep2_content', 'old_childstep2_required_time',
            'old_childstep3_title', 'old_childstep3_content', 'old_childstep3_required_time',
            'old_childstep4_title', 'old_childstep4_content', 'old_childstep4_required_time',
            'old_childstep5_title', 'old_childstep5_content', 'old_childstep5_required_time',
            'old_childstep6_title', 'old_childstep6_content', 'old_childstep6_required_time',
            'old_childstep7_title', 'old_childstep7_content', 'old_childstep7_required_time',
            'old_childstep8_title', 'old_childstep8_content', 'old_childstep8_required_time',
            'old_childstep9_title', 'old_childstep9_content', 'old_childstep9_required_time',
            'old_childstep10_title', 'old_childstep10_content', 'old_childstep10_required_time',
            'error_messages_title_childstep1', 'error_messages_content_childstep1', 'error_messages_img_childstep1', 'error_messages_required_time_childstep1',
            'error_messages_title_childstep2', 'error_messages_content_childstep2', 'error_messages_img_childstep2', 'error_messages_required_time_childstep2',
            'error_messages_title_childstep3', 'error_messages_content_childstep3', 'error_messages_img_childstep3', 'error_messages_required_time_childstep3',
            'error_messages_title_childstep4', 'error_messages_content_childstep4', 'error_messages_img_childstep4', 'error_messages_required_time_childstep4',
            'error_messages_title_childstep5', 'error_messages_content_childstep5', 'error_messages_img_childstep5', 'error_messages_required_time_childstep5',
            'error_messages_title_childstep6', 'error_messages_content_childstep6', 'error_messages_img_childstep6', 'error_messages_required_time_childstep6',
            'error_messages_title_childstep7', 'error_messages_content_childstep7', 'error_messages_img_childstep7', 'error_messages_required_time_childstep7',
            'error_messages_title_childstep8', 'error_messages_content_childstep8', 'error_messages_img_childstep8', 'error_messages_required_time_childstep8',
            'error_messages_title_childstep9', 'error_messages_content_childstep9', 'error_messages_img_childstep9', 'error_messages_required_time_childstep9',
            'error_messages_title_childstep10', 'error_messages_content_childstep10', 'error_messages_img_childstep10', 'error_messages_required_time_childstep10',
    ],
    template: `
        <div class="c-form__childstep-area">
            <div class="c-form__childstep-form">
                <h4 class="c-form__sub-title">STEP{{form_id}}</h4>
                <div class="c-form__input-area">
                    <label :for="'childstep'+form_id+'_title'" class="c-form__label">STEP{{form_id}}名</label>
                    <input type="text" class="c-form__input" :name="'childstep'+form_id+'_title'" :id="'childstep'+form_id+'_title'" v-bind:value="this['old_childstep'+form_id+'_title']">
                    <p class="c-form__err-msg">{{this['error_messages_title_childstep'+this._props.form_id]}}</p>                    
                </div>                                
                <div class="c-form__input-area">
                    <label :for="'childstep'+form_id+'_content'" class="c-form__label">STEP{{form_id}}説明</label>
                    <textarea :name="'childstep'+form_id+'_content'" :id="'childstep'+form_id+'_content'" cols="30" rows="10"  class="c-form__input c-form__textarea c-form__textarea--childstep">{{this['old_childstep'+this._props.form_id+'_content']}}</textarea>
                    <p class="c-form__err-msg">{{this['error_messages_content_childstep'+this._props.form_id]}}</p>
                </div>
                <div class="c-form__input-area" style="overflow:hidden;">
                    <label for="'childstep'+form_id+'_img'" class="c-form__label">STEP{{form_id}}イメージ画像</label>
                    <label for="'childstep'+form_id+'_img'" class="c-form__area-drop c-form__area-drop--childstep js-area-drop">画像をドラッグ＆ドロップ
                        <img src="" alt="" class="c-form__prev-img c-form__prev-img--childstep prev-img">
                        <input type="file" :name="'childstep'+form_id+'_img'" :id="'childstep'+form_id+'_img'" class="c-form__file-input c-form__file-input--childstep js-input-file">
                    </label>
                    <p class="c-form__err-msg">{{this['error_messages_img_childstep'+this._props.form_id]}}</p>
                </div>
                <div class="c-form__input-area">
                    <label for="'childstep'+form_id+'_required-time'" class="c-form__label">STEP{{form_id}}所要時間</label>
                    <div class="c-form__required-time-input-area">
                        <input type="number" step="1" min="1" max="255" class="c-form__input c-form__required-time-input-area--input" :name="'childstep'+form_id+'_required-time'" :id="'childstep'+form_id+'_required-time'" v-bind:value="this['old_childstep'+form_id+'_required_time']">
                        <span class="c-form__required-time-input-area--unit">時間</span>
                    </div>
                    <p class="c-form__err-msg">{{this['error_messages_required_time_childstep'+this._props.form_id]}}</p>
                </div>
            </div>
        </div>
`
})


//STEP登録フォームを増減させるボタンのテンプレート
Vue.component('v-create-step-submit-btn', {
    props:['count_of_childstep', 'old_number_of_childstep'],
    mounted: function(){
        this.$parent.oldNumberOfChildstep = this._props.old_number_of_childstep
    },
    template: `
        <div>  
            <input type="number" step="1" min="1" max="10" name="number_of_childstep" id="number_of_childstep" :value="count_of_childstep" class="js-count-of-childstep" hidden/>
            <div class="c-btn__row-btn-area">
                <div class="c-btn c-btn--reduce-childstep c-step-number-change-btn js-reduce-childstep" v-on:click="$emit('enreduce-step-form')">STEPを減らす</div>
                <div class="c-btn c-btn--add-childstep c-step-number-change-btn js-add-childstep" v-on:click="$emit('enadd-step-form')">STEPを増やす</div>
            </div>
        </div>
`
})


//STEP登録用のインスタンス
new Vue({
    el: '#step-create',
    data: {
        forms: [
            {
                id: 1,
            }
        ],
        errorMessages:'',
        countOfChildstep: 1,
        oldNumberOfChildstep: '',
        oldChildstep1Title: '',
        //新しいIDを作成する関数。現在のフォームの数にプラス1した値をIDにする。
        makeID: function(){
            return this.countOfChildstep = this.countOfChildstep + 1;
        }
    },
    methods: {
        //フォームを追加するメソッド
        addStepForm: function () {
            //フォームが10個より少ないなら新しいIDを取得して、追加
            if(this.countOfChildstep < 10){
                let form = {
                    id: this.makeID(),
                };
                this.forms.push(form);
            }
        },
        //フォームを減らすメソッド
        reduceStepForm: function () {
            if (this.countOfChildstep > 1) {
                this.countOfChildstep = this.countOfChildstep - 1;//現在のフォームの数を1減らす
                this.forms.pop();
            }
        }
    },
    //POST送信でバリデーションエラーとなった場合に、POST送信前に作成していたフォームの数だけ、フォームを作成する
    mounted: function(){
        let loopForForm = Number(this.oldNumberOfChildstep)
        for(let i = 1; i < loopForForm; i++){
            this.addStepForm()
        }
    }
})
