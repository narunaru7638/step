import Vue from 'vue'

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
            const ajax_url = '/ajax/step/'+this.category+'?page='+ this.page;
            axios.get(ajax_url)
                .then(response => {
                    this.items = response.data;
                });
        },
        movePage(page) {
            this.page = page;
            this.getSteps();
        },
        getCategoryId(){
            let url_param_category  = location.href;
            let index = url_param_category.indexOf('show-steps');
            let category_id = url_param_category.slice(index + 11);
            this.category = parseInt(category_id);
        }
    },
    mounted() {
        this.getCategoryId();
        this.getSteps();
    },
    routes: [
        // コロンで始まる動的セグメント
        { path: '/show-steps/:id', component: Vue }
    ]
});
