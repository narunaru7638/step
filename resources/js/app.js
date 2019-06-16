import Vue from 'vue'

//       ページネーションなしバージョン

Vue.component('steps-card', {
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

Vue.component('steps-list', {
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

new Vue({
    el: '#steps-card-index1',
    data: {
        steps: {}
    },
    mounted() {
        var self = this;
        var url = '/ajax/step';
        axios.get(url).then(function(response){
            self.steps = response.data;
        });
    }
});

new Vue({
    el: '#steps-list-index',
    data: {
        steps: {}
    },
    mounted() {
        var self = this;
        var url = '/ajax/step';
        axios.get(url).then(function(response){
            self.steps = response.data;
        });
    }
});

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
    template:`
    
        <ul class="pagination">
            <li class="page-item" v-if="hasPrev">
                <a class="page-link" href="#" @click.prevent="move(data.current_page-1)">前へ</a>
            </li>
            <li :class="getPageClass(page)" v-for="page in pages">
                <a class="page-link" href="#" v-text="page" @click.prevent="move(page)"></a>
            </li>
            <li class="page-item" v-if="hasNext">
                <a class="page-link" href="#" @click.prevent="move(data.current_page+1)">次へ</a>
            </li>
        </ul>
`
});


new Vue({
    el: '#app',
    data: {
        page: 1,
        items: [],
        category_id: 0
    },
    methods: {
        getSteps() {

            // const url = '/ajax/pagination?page='+ this.page;
            // const url = '/ajax/step?page='+ this.page;
            const url = '/ajax/step/?page='+ this.page + '&category_id=' + this.category_id;


            axios.get(url)
                .then(response => {

                    this.items = response.data;

                });

        },
        movePage(page) {

            this.page = page;
            this.getSteps();

        }
    },
    mounted() {

        this.getSteps();

    }
});
