import Vue from 'vue'

// import Router from 'vue-router'
//
// Vue.use(Router);
//
//
// const router = new VueRouter({
//    mode: 'history',
//    routes:[
//        { path: '/show-steps:id', }
//    ]
// });

//       ページネーションなしバージョン

// Vue.component('steps-card', {
//     props: ['index', 'id', 'title', 'created_at', 'pic_img', 'category_name', 'user_name'],
//
//     template: `
//         <div class="c-article-card">
//             <a v-bind:href="'/detail-steps/'+id">
//                 <img class="c-article-card__img" v-if="pic_img !== null" v-bind:src="'/storage/'+pic_img" alt="" >
//                 <img class="c-article-card__img" v-if="pic_img === null" v-bind:src="'/storage/sample-img.png'" alt="" >
//             </a>
//             <div class="c-article-card__info">
//                 <p class="c-article-card__category">{{category_name}}</p>
//                 <p class="c-article-card__username">{{user_name}}</p>
//                 <p class="c-article-card__date">{{created_at}}</p>
//             </div>
//             <a v-bind:href="'/detail-steps/'+id"><p class="c-article-card__title">{{title}}</p></a>
//         </div>
// `
// })
//
// Vue.component('steps-list', {
//     props: ['index', 'id', 'title', 'created_at', 'pic_img', 'category_name', 'user_name'],
//
//     template: `
//         <div class="c-article-list">
//             <a class="c-article-list__img" v-bind:href="'/detail-steps/'+id">
//                 <img v-if="pic_img !== null" v-bind:src="'/storage/'+pic_img" alt="" >
//                 <img v-if="pic_img === null" v-bind:src="'/storage/sample-img.png'" alt="" >
//             </a>
//             <div class="c-article-list__content">
//                 <div class="c-article-list__info">
//                     <p class="c-article-list__category" >{{category_name}}</p>
//                     <p class="c-article-list__username" >{{user_name}}</p>
//                     <p class="c-article-list__date" >{{created_at}}</p>
//                 </div>
//                 <a v-bind:href="'/detail-steps/'+id"><p class="c-article-list__title" >{{title}}</p></a>
//             </div>
//         </div>
// `
// })
//
// new Vue({
//     el: '#steps-card-index1',
//     data: {
//         steps: {}
//     },
//     mounted() {
//         var self = this;
//         var url = '/ajax/step';
//         axios.get(url).then(function(response){
//             self.steps = response.data;
//         });
//     }
// });
//
// new Vue({
//     el: '#steps-list-index',
//     data: {
//         steps: {}
//     },
//     mounted() {
//         var self = this;
//         var url = '/ajax/step';
//         axios.get(url).then(function(response){
//             self.steps = response.data;
//         });
//     }
// });

//       ページネーションなしバージョンここまで


// Vue.component('steps-list', {
//     props: ['index', 'id', 'title', 'created_at', 'pic_img', 'category_name', 'user_name'],
//
//     template: `
//         <div class="c-article-list">
//             <a class="c-article-list__img" v-bind:href="'/detail-steps/'+id">
//                 <img v-if="pic_img !== null" v-bind:src="'/storage/'+pic_img" alt="" >
//                 <img v-if="pic_img === null" v-bind:src="'/storage/sample-img.png'" alt="" >
//             </a>
//             <div class="c-article-list__content">
//                 <div class="c-article-list__info">
//                     <p class="c-article-list__category" >{{category_name}}</p>
//                     <p class="c-article-list__username" >{{user_name}}</p>
//                     <p class="c-article-list__date" >{{created_at}}</p>
//                 </div>
//                 <a v-bind:href="'/detail-steps/'+id"><p class="c-article-list__title" >{{title}}</p></a>
//             </div>
//         </div>
// `
// })

// Vue.component('v-pagination', {
//     props: {
//         data: {}  // paginate()で取得したデータ
//     },
//     methods: {
//         move(page) {
//
//             if(!this.isCurrentPage(page)) {
//
//                 this.$emit('move-page', page);
//
//             }
//
//         },
//         isCurrentPage(page) {
//
//             return (this.data.current_page == page); // 独自イベントを送出
//
//         },
//         getPageClass(page) {
//
//             let classes = ['page-item'];
//
//             if(this.isCurrentPage(page)) {
//
//                 classes.push('active');
//
//             }
//
//             return classes;
//
//         }
//     },
//     computed: {
//         hasPrev() {
//
//             return (this.data.prev_page_url != null);
//
//         },
//         hasNext() {
//
//             return (this.data.next_page_url != null);
//
//         },
//         pages() {
//
//             let pages = [];
//
//             for(let i = 1 ; i <= this.data.last_page ; i++) {
//
//                 pages.push(i);
//
//             }
//
//             return pages;
//
//         }
//     },
//     template:`
//         <ul class="pagination">
//             <li class="page-item" v-if="hasPrev">
//             <a class="page-link" href="#" @click.prevent="move(data.current_page-1)">前へ</a>
//             </li>
//             <li :class="getPageClass(page)" v-for="page in pages">
//             <a class="page-link" href="#" v-text="page" @click.prevent="move(page)"></a>
//             </li>
//             <li class="page-item" v-if="hasNext">
//             <a class="page-link" href="#" @click.prevent="move(data.current_page+1)">次へ</a>
//             </li>
//         </ul>
// `
// });
//
//
// new Vue({
//     el: '#steps-list-index2',
//     data: {
//         page: 1,
//         steps: {}
//     },
//     methods: {
//         getSteps() {
//             const url = '/ajax/step?page='+ this.page;
//             axios.get(url)
//                 .then(response => {
//                     this.items = response.data;
//                 });
//         },
//         movePage(page) {
//             this.page = page;
//             this.getSteps();
//         }
//     },
//     mounted() {
//         this.getSteps();
//     }
// });
//

// // Vueの基本の書き方
// new Vue({ // Vueインスタンス生成
//     el: '#app1', // elでスコープを指定
//     data: { // dataの中にプロパティを定義しておけば、vueの中で保持して使いまわせる。今回はテンプレートに表示している。
//         test: 'vueのテンプレートの構文。{{}}で囲って処理が書ける。'
//     }
// })

// Vueの基本の書き方
// new Vue({ // Vueインスタンス生成
//     el: '#app1', // elでスコープを指定
//     data: { // dataの中にプロパティを定義しておけば、vueの中で保持して使いまわせる。今回はテンプレートに表示している。
//         // test: 'vueのテンプレートの構文。{{}}で囲って処理が書ける。',
//         teststep:{}
//     },
//     // created:{
//     //     const self = this
//     //     var url = '/ajax/teststep'
//     //     axios.get(url).then(function(response){
//     //         self.teststep = response.data;
//     //     })
//     //
//     // }
//
//
// });

//サンプル用
//


Vue.component('v-card', {
    // コンポーネントで使う場合のdataは必ず関数にすること！通常のオブジェクト形式だと全コンポーネントでdataが共有されてしまう
    // data: function () {
    //     return {
    //         step: 0
    //     }
    // },
    // template: '<div>testestes {{ count }} times.</div>'

    props: ['index', 'id', 'title', 'created_at', 'pic_img', 'category_name', 'user_name'],

    template: `
        <div class="c-article-card">
            <a v-bind:href="'/detail-steps/'+id">
                <img class="c-article-card__img" v-if="pic_img !== null" v-bind:src="'/storage/'+pic_img" alt="" >
                <img class="c-article-card__img" v-if="pic_img === null" v-bind:src="'/storage/sample-img.png'" alt="" >
            </a>
            <div class="c-article-card__info">
                <p class="c-article-card__category">{{category_name}}</p>
                <p class="c-article-card__username">{{user_name}}</p>
                <p class="c-article-card__date">{{created_at}}</p>
            </div>
            <a v-bind:href="'/detail-steps/'+id"><p class="c-article-card__title">{{title}}</p></a>
        </div>
`


})

Vue.component('v-list', {

    props: ['index', 'id', 'title', 'created_at', 'pic_img', 'category_name', 'user_name'],

    template: `
        <div class="c-article-list">
            <a class="c-article-list__img" v-bind:href="'/detail-steps/'+id">
                <img v-if="pic_img !== null" v-bind:src="'/storage/'+pic_img" alt="" >
                <img v-if="pic_img === null" v-bind:src="'/storage/sample-img.png'" alt="" >
            </a>
            <div class="c-article-list__content">
                <div class="c-article-list__info">
                    <p class="c-article-list__category" >{{category_name}}</p>
                    <p class="c-article-list__username" >{{user_name}}</p>
                    <p class="c-article-list__date" >{{created_at}}</p>
                </div>
                <a v-bind:href="'/detail-steps/'+id"><p class="c-article-list__title" >{{title}}</p></a>
            </div>
        </div>
`


})


Vue.component('v-pagination', {
    props: {
        data: {}  // paginate()で取得したデータ
    },
    methods: {
        move(page) {

            if(!this.isCurrentPage(page)) {

                this.$emit('move-page', page);

            }

        },
        isCurrentPage(page) {

            return (this.data.current_page == page); // 独自イベントを送出

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
        hasPrev() {

            return (this.data.prev_page_url != null);

        },
        hasNext() {

            return (this.data.next_page_url != null);

        },
        pages() {

            let pages = [];

            for(let i = 1 ; i <= this.data.last_page ; i++) {

                pages.push(i);

            }

            return pages;

        }
    },
    // template:`
    //     <div class="c-pagination">
    //
    //         <ul class="pagination">
    //             <li class="page-item" v-if="hasPrev">
    //                 <a class="page-link" href="#" @click.prevent="move(data.current_page-1)">前へ</a>
    //             </li>
    //             <li :class="getPageClass(page)" v-for="page in pages">
    //                 <a class="page-link" href="#" v-text="page" @click.prevent="move(page)"></a>
    //             </li>
    //             <li class="page-item" v-if="hasNext">
    //                 <a class="page-link" href="#" @click.prevent="move(data.current_page+1)">次へ</a>
    //             </li>
    //         </ul>
    //     </div>
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
    el: '#app',
    data: {
        page: 1,
        items: [],
        // category: 'show-steps/:id',
        category: 0

    },
    methods: {
        getSteps() {

            // const url = '/ajax/step/0?page='+ this.page;

            const ajax_url = '/ajax/step/'+this.category+'?page='+ this.page;


            // const url = '/ajax/step/1;
            // console.log(url);

            axios.get(ajax_url)
                .then(response => {
                    // console.log(this.items);
                    // console.log(response.data);

                    this.items = response.data;
                    // console.log(this.items);
                });
        },
        movePage(page) {
            console.log(this.page);
            this.page = page;
            this.getSteps();
            console.log(this.page);


        },
        getCategoryId(){
            let url_param_category  = location.href;
            let index = url_param_category.indexOf('show-steps');
            let category_id = url_param_category.slice(index + 11);

            // console.log(url_param_category);
            // console.log(index);
            // console.log(category_id);
            //
            //
            // console.log('test');
            //
            // console.log(url_param_category);
            console.log(this.category);

            this.category = parseInt(category_id);
            // this.category = 4;

            console.log(this.category);
        }
    },
    mounted() {
        // console.log('test');
        this.getCategoryId();

        this.getSteps();

    },
    routes: [
        // コロンで始まる動的セグメント
        { path: '/show-steps/:id', component: Vue }
    ]
});


// Vue.component('button-counter', {
//     // コンポーネントで使う場合のdataは必ず関数にすること！通常のオブジェクト形式だと全コンポーネントでdataが共有されてしまう
//     data: function () {
//         return {
//             count: 0
//         }
//     },
//     template: '<button v-on:click="count++">You clicked me {{ count }} times.</button>'
// })
// //インスタンス化する
//
// new Vue({el: '#app7'})
